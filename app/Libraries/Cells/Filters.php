<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Libraries\Cells;

class Filters
{
    /**
     * A view cell that displays the list of available filters.
     *
     * @param mixed $params
     */
    public function renderList($params = [])
    {
        if (! isset($params['model'])) {
            throw new \RuntimeException('You must provide the Filter view cell with the model to use.');
        }

        $model = model($params['model']);
        $view  = config('Bonfire')->views['filter_list'];

        return view($view, [
            'filters' => $model->getFilters(),
            'target'  => $params['target'] ?? null,
        ]);
    }
}
