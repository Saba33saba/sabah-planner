@extends('layouts.app')

@section('title', 'تعديل مهمة')

@section('content')
    <div class="max-w-3xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">تعديل المهمة</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pr-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium">عنوان المهمة</label>
                <input type="text" name="title" class="w-full border-gray-300 rounded p-2" value="{{ $task->title }}">
            </div>

            <div>
                <label class="block mb-1 font-medium">الوصف</label>
                <textarea name="description" class="w-full border-gray-300 rounded p-2 h-32">{{ $task->description }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">الحالة</label>
                <select name="status" class="w-full border-gray-300 rounded p-2">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>قيد التنفيذ</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>مكتملة</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium">تاريخ الاستحقاق</label>
                <input type="date" name="due_date" class="w-full border-gray-300 rounded p-2"
                    value="{{ $task->due_date }}">
            </div>

            <div>
                <label class="block mb-1 font-medium">الحالة</label>
                <select name="status" class="w-full border-gray-300 rounded p-2">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>قيد التنفيذ</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>قيد العمل</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>مكتملة</option>
                </select>
            </div>


            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                تحديث
            </button>

            <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                رجوع
            </a>

        </form>

    </div>
@endsection
