<?php

namespace App\View\Components;

use App\Models\Models\Profile;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Nav extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $streak = 0, public int $experience = 0)
    {
        $profile = Profile::query()->where('user_id', auth()->id())->firstOrFail();
        $this->streak =$profile->streak_days;
        $this->experience = $profile->experience;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav');
    }
}
