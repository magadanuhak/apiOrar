<?php

namespace App\Observers;

use App\Portfolio;

class PortfolioObserver
{

    public function creating(Portfolio $portfolio)
    {
        $portfolio->title = ucfirst($portfolio->title);
    }

}
