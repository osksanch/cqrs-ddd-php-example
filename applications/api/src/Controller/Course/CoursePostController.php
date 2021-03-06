<?php

declare(strict_types = 1);

namespace CodelyTv\Api\Controller\Course;

use CodelyTv\Shared\Infrastructure\Api\Controller\ApiController;
use CodelyTv\Shared\Infrastructure\Api\Response\ApiHttpCreatedResponse;
use CodelyTv\Context\Course\Module\Course\Application\Create\CreateCourseCommand;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use Symfony\Component\HttpFoundation\Request;

final class CoursePostController extends ApiController
{
    protected function exceptions(): array
    {
        return [];
    }

    public function __invoke(Request $request)
    {
        $command = new CreateCourseCommand(
            new Uuid($request->get('request_id')),
            $request->get('id'),
            $request->get('title'),
            $request->get('description')
        );

        $this->dispatch($command);

        return new ApiHttpCreatedResponse();
    }
}
