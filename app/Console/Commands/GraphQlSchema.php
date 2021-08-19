<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GraphQlSchema extends Command
{
    // todo: create query
    // todo: split workers,users types file
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:graphQl-schema';

    protected $paginateDefaultCount = 10;

    protected $now = 0;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate a schema for graphQl';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->now = date('Y_m_d_h_i_');
    }

    /**
     * Execute the console command.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $types = $this->typesAsSchemaSections();
        $queries = $this->buildSchemaQueries();


        $schemaScalars = $this->schemaScalars();



        // queries files
        file_put_contents(base_path('graphql/queries.graphql'),$queries);



        // types files
        file_put_contents(base_path("graphql/types.graphql"), $schemaScalars);
        foreach ($types as $modelType => $schema){
            // create models folders
            $this->makeDir(base_path("graphql/$modelType/"));
            // create types files
            file_put_contents(base_path("graphql/$modelType/"."types.graphql"), $schema);

            // create types file
            file_put_contents(base_path("graphql/types.graphql"), "#import $modelType/*types.graphql\n", FILE_APPEND);
        }
        return true;
    }


    protected function typesAsSchemaSections(): array
    {

        $sections = collect($this->types())->map(function ($k,$model){
            $modelNameSpace = explode('\\', $model);
            return [$modelNameSpace[count($modelNameSpace)-2] => $k];
        });

        $schemaSections = [];

        foreach ($sections as $model => $types){
            $section = key($types);
//            $schemaText = $this->countComment('Types', collect($sections)->pluck($section)->whereNotNull()->count());
            $schemaText = '';

            foreach ($types as $columns){

                $schemaText .= 'type ' . class_basename($model) . ' {' . "\n";
                $schemaText .= $this->countComment('Fields', count($columns),"");

                foreach ($columns as $column => $columnType) {
                    $schemaText .= '    ' . $column . ': ' . $columnType . "\n";
                }
                $schemaText .= "}\n\n";
                $schemaSections[$section][] =$schemaText;
            }
        }


        return collect($schemaSections)->map(function ($item){
            return implode("", $item);
        })->toArray();
    }

    protected function types(): array
    {
        $models = [];
        foreach (getModels() as $model) {
            $m = new $model;


            $DBColumns = DB::select('describe ' . $m->getTable());

            $columns = [];
            foreach ($DBColumns as $column) {
                $columns[$column->Field] = SQLTypeToGraphQL($column->Type, $column->Field);// [0]->Field
            }

            $relations = collect(getAllRelations($m));
            $relations = $relations
                ->filter(function ($i) {
                    return !(class_basename($i[1]) == 'DatabaseNotification');
                })
                ->map(function ($models, $relationName) {
                $relationType = lcfirst($models[0]);
                $isSingle = in_array($relationType, ['hasOne', 'belongsTo']);

                return $isSingle
                    ? (class_basename($models[1]) . ' @' . $relationType)
                    : ('[' . class_basename($models[1]) . '!] @' . $relationType);

            })->toArray();

            $thisType = array_merge($columns, $relations);

            $models[($model)] = $thisType;

        }
        return $models;
    }

    public function buildSchemaQueries(): string
    {
        $schemaText = "\nextend type Query {\n";
        foreach ($this->types() as $model => $thisType) {
            $m = new $model;
            $tables = $m->getTable();
            $table = Str::singular($tables);
            $schemaText .="    $tables: [".class_basename($model)."!]! @paginate(defaultCount: ".$this->paginateDefaultCount.")\n";
            $schemaText .="    $table(id: ID! @eq): ".class_basename($model)." @find\n\n";

        }
        $schemaText .= '}';
        return $schemaText;
    }

    public function countComment($name='', $count=0, $prefix="\n\n", $suffix="\n"): string
    {
        return $prefix .'"'."$name Count:".$count.'"'.$suffix;
    }

    public function schemaScalars(): string
    {
        return '"A date string with format `Y-m-d`, e.g. `2011-05-23`."
scalar Date @scalar(class: "Nuwave\\\\Lighthouse\\\\Schema\\\\Types\\\\Scalars\\\\Date")

scalar Time @scalar(class: "App\\\\GraphQL\\\\Scalars\\\\Time")

"A datetime string with format `Y-m-d H:i:s`, e.g. `2018-05-23 13:43:32`."
scalar DateTime @scalar(class: "Nuwave\\\\Lighthouse\\\\Schema\\\\Types\\\\Scalars\\\\DateTime")'."\n\n";
    }


    public function makeDir($path): bool
    {
     return is_dir($path) || mkdir($path);
}
}
