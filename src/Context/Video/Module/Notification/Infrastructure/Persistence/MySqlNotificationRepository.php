<?php

declare(strict_types = 1);

namespace CodelyTv\Context\Video\Module\Notification\Infrastructure\Persistence;

use CodelyTv\Context\Video\Module\Notification\Domain\Notification;
use CodelyTv\Context\Video\Module\Notification\Domain\NotificationId;
use CodelyTv\Context\Video\Module\Notification\Domain\NotificationRepository;
use CodelyTv\Shared\Infrastructure\Doctrine\Repository;

final class MySqlNotificationRepository extends Repository implements NotificationRepository
{
    public function search(NotificationId $id)
    {
        return $this->repository(Notification::class)->find($id);
    }

    public function save(Notification $notification)
    {
        $this->persist($notification);
    }
}
