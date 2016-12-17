<?php

namespace App\Repositories\Eloquents;

use App\Models\Activity;
use App\Repositories\Interfaces\FavoriteInterface;
use App\Repositories\Interfaces\FollowInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\Interfaces\TimelineInterface;
use App\Repositories\BaseRepository;
use Exception;
use App\Repositories\Interfaces\BookInterface;
use App\Repositories\Interfaces\CommentInterface;
use App\Repositories\Interfaces\ReviewInterface;
use App\Repositories\Interfaces\RateInterface;

class TimelineRepository extends  BaseRepository implements TimelineInterface
{
    protected $users;
    protected $favorites;
    protected $relationships;
    protected $activities;
    protected $reviews;
    protected $comments;
    protected $rate;
    protected $model;

    public function __construct(
        UserInterface $user,
        FavoriteInterface $favorite,
        FollowInterface $relationship,
        CommentInterface $comment,
        ReviewInterface $review,
        RateInterface $rate,
        Activity $activity
        ) {
        $this->users = $user;
        $this->favorites = $favorite;
        $this->relationships = $relationship;
        $this->activities = $activity;
        $this->reviews = $review;
        $this->comments = $comment;
        $this->rates = $rate;
    }

    public function getTimeline($id, $currentUser)
    {
        $timeline = [
            'favorites' => $this->favorites->getFavoriteBook($id),
            'followed' => $this->relationships->getFollow($id, $currentUser),
        ];

        return $timeline;
    }

    public function getActivity($id)
    {
        $actions = $this->activities->where('user_id', $id)->orderBy('id', 'desc')->get();
        $activities = [];
        $data = [];
        foreach ($actions as $action) {
            $type = $action->target_type;
            $data['content'] = $this->$type->getContent($action->target_id);
            $data['title'] = $action->title .
                (($data['content']->name) ? ('user '.$data['content']->name):('book '. $data['content']->tittle)).
                ' at '. $data['content']->created_at;
            $data['user'] = $action->user;
            $data['type'] = $action->target_type;
            $data['actionId'] = $action->id;
            $activities[] = $data;
        }

        return $activities;
    }

    public function insertAction($userId, $type, $actionId)
    {
        if ($this->create(['user_id' => $userId, 'target_type' => $type, '$target_id' => $actionId])) {

            return true;
        }

        return false;
    }

    public function deleteAction($userId, $type, $actionId)
    {
        $this->model = $this->activities;
        $action = $this->activities->where('user_id', $userId)->where('target_type', $type)->where('target_id', $actionId)->first();

        if ($action && $this->delete($action->id)) {

            return true;
        }

        return false;
    }
}