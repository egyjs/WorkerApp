<?php


namespace App\Constants;


class DB
{
    public const workerStatus = [
        'REVIEW',
        'REREVIEW',
        'PENDING',
        'APPROVED', //ACTIVE
        'BANNED'
    ];


    public const userStatus = [
        'ACTIVE',
        'BANNED'
    ];

    public const userIssuesStatus = [
        'PENDING',
        'ACCEPT',
//        'reject', // reject table will just be `PENDING` but we wont bring this issue to the same worker for one day
        'INFONEED',
    ];

    public const building_types = [
        'VILLA',
        'APARTMENT',
        'OFFICE'
    ];


    public const issueFilesTypes = [
        'IMAGE',
        'VIDEO',
//        'DOC',// cant add doc
    ];



}
