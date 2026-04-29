@extends('layouts.app')

@section('title', 'عرض مهمة')

@section('content')
    <div class="max-w-3xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-4">{{ $task->title }}</h1>

        <p class="mb-4 text-gray-700">{{ $task->description ?? 'لا يوجد وصف' }}</p>

        <p class="mb-6">
            <strong>الحالة:</strong>
            @if ($task->status === 'pending')
                <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded">
                    قيد التنفيذ
                </span>
            @else
                <span class="px-2 py-1 bg-green-200 text-green-800 rounded">
                    مكتملة
                </span>
            @endif
        </p>

        <a href="{{ route('tasks.edit', $task->id) }}" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">
            تعديل
        </a>

        <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            رجوع
        </a>

    </div>
@endsection
