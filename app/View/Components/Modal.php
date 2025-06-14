<?php

namespace App\View\Components;

use App\Models\Models\Item;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public object $plan,
        public object $challenge,
        public int $day,
        public ?Item $item = null,
        public ?int $reps = 0,
    )
    {
        $this->item = Item::query()->where('activities_id',  $challenge->activities_id)->where('difficulty_id', $plan->difficulty_id)->first();
        $from = $this->item->from;
        $to = $this->item->to;
        $days = $this->plan->difficulty->days;
        $this->reps = $from + ($to-$from)*($this->day/$days);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
