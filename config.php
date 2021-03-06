<?php

use humhub\modules\dashboard\widgets\Sidebar;
use humhub\commands\CronController;
use humhub\commands\IntegrityController;

return [
    'id' => 'external_calendar',
    'class' => 'humhub\modules\external_calendar\Module',
    'namespace' => 'humhub\modules\external_calendar',
    'events' => [
        ['class' => Sidebar::className(), 'event' => Sidebar::EVENT_INIT, 'callback' => ['humhub\modules\external_calendar\Module', 'onDashboardSidebarInit']],
        ['class' => 'humhub\modules\calendar\interfaces\CalendarService', 'event' => 'getItemTypes', 'callback' => ['humhub\modules\external_calendar\Events', 'onGetCalendarItemTypes']],
        ['class' => 'humhub\modules\calendar\interfaces\CalendarService', 'event' => 'findItems', 'callback' => ['humhub\modules\external_calendar\Events', 'onFindCalendarItems']],
        ['class' => CronController::className(), 'event' => CronController::EVENT_ON_HOURLY_RUN, 'callback' => ['humhub\modules\external_calendar\Events', 'onCronRun']],
        ['class' => CronController::className(), 'event' => CronController::EVENT_ON_DAILY_RUN, 'callback' => ['humhub\modules\external_calendar\Events', 'onCronRun']],
        ['class' => IntegrityController::className(), 'event' => IntegrityController::EVENT_ON_RUN, 'callback' => ['humhub\modules\external_calendar\Events', 'onIntegrityCheck']]
    ],
];
?>

