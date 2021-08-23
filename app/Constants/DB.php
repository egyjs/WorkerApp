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

    public const workerOfferStatus = [
        'OFFERED',
        'ACCEPTED',
        'WAITING_WORKER',
        'STARTED',
        'FINISHED',
        'CANCELLED',
    ];

    public const workerOfferPaymentStatus = [
        'UNPAID',
        'PAID',
        'PARTIALLY_PAID',
        'REFUNDED',
    ];

    public const userStatus = [
        'ACTIVE',
        'BANNED'
    ];

    public const userIssuesStatus = [
        'PENDING',
        'ACCEPT',
//      'reject', // reject table will just be `PENDING` but we won't bring this issue to the same worker for one day // if reject get auto worker
        'INFONEED',
        'CANCELLED'
    ];

    public const building_types = [
        'HOME',
        'APARTMENT',
    ];


    public const issueFilesTypes = [
        'IMAGE',
        'VOICE',
        'VIDEO',
    ];

    public const canceledOffersBy = [
        'USER',
        'WORKER',
        'customers_service'
    ];

    public const paymentTypes = [
        'PAYPAL',

        'WALLET',

        'STRIPE|WALLETS',
        'STRIPE|CARDS',
    ];



}
