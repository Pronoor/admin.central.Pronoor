<?php

namespace App\Traits\Cms;

use App\Models\MenuBar;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait MenuBarTrait
{
    public function getAllMenus()
    {
        return MenuBar::all();
    }

    public function showMenu($menuId)
    {
        return MenuBar::findOrFail($menuId);
    }

    public function updateMenu($menuId, array $data)
    {
        try {
            $menu = MenuBar::findOrFail($menuId);

            $validatedData = $this->validatemenuData($data);

            $menu->update($validatedData);

            return response()->json($menu);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Menu not found'], 404);
        }
    }

    public function destroyMenu($menuId)
    {
        try {
            $menu = MenuBar::findOrFail($menuId);

            $menu->delete();

            return response()->json(['message' => 'Menu deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Menu not found'], 404);
        }
    }

}
