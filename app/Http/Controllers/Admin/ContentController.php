<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $query = Content::query();
        
        if ($request->filled('group')) {
            $query->where('group', $request->group);
        }
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('key', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('value_ru', 'like', "%{$search}%")
                  ->orWhere('value_en', 'like', "%{$search}%");
            });
        }

        $contents = $query->orderBy('group')->orderBy('order')->paginate(50);
        $groups = Content::getGroups();

        return view('admin.content.index', compact('contents', 'groups'));
    }

    public function create()
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $groups = Content::getGroups();
        return view('admin.content.create', compact('groups'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $request->validate([
            'key' => 'required|string|max:255|unique:contents,key',
            'group' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'value_ru' => 'nullable|string',
            'value_en' => 'nullable|string',
        ]);

        Content::create([
            'key' => $request->key,
            'group' => $request->group,
            'type' => 'text',
            'value_ru' => $request->value_ru,
            'value_en' => $request->value_en,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.content.index')
            ->with('success', 'Контент создан успешно');
    }

    public function edit(Content $content)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $groups = Content::getGroups();
        return view('admin.content.edit', compact('content', 'groups'));
    }

    public function update(Request $request, Content $content)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $request->validate([
            'key' => 'required|string|max:255|unique:contents,key,' . $content->id,
            'group' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'value_ru' => 'nullable|string',
            'value_en' => 'nullable|string',
        ]);

        $content->update([
            'key' => $request->key,
            'group' => $request->group,
            'value_ru' => $request->value_ru,
            'value_en' => $request->value_en,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.content.index')
            ->with('success', 'Контент обновлен успешно');
    }

    public function destroy(Content $content)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $content->delete();

        return redirect()->route('admin.content.index')
            ->with('success', 'Контент удален успешно');
    }

    public function bulkAction(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $request->validate([
            'action' => 'required|in:delete',
            'ids' => 'required|array',
            'ids.*' => 'exists:contents,id',
        ]);

        if ($request->action === 'delete') {
            Content::whereIn('id', $request->ids)->delete();
            return back()->with('success', 'Выбранные элементы удалены');
        }

        return back()->with('error', 'Действие не выполнено');
    }
}