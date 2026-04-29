@extends('layouts.app')

@section('title', 'إضافة مهمة')

@section('content')
    <div class="max-w-3xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">إضافة مهمة جديدة</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pr-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">عنوان المهمة</label>
                <input type="text" name="title" class="w-full border-gray-300 rounded p-2" value="{{ old('title') }}">
            </div>

            <div>
                <label class="block mb-1 font-medium">الوصف</label>
                <textarea name="description" class="w-full border-gray-300 rounded p-2 h-32">{{ old('description') }}</textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">تاريخ الاستحقاق</label>
                <input type="date" name="due_date" class="w-full border-gray-300 rounded p-2"
                    value="{{ old('due_date') }}">
            </div>
            <div>
                <label class="block mb-1 font-medium">الحالة</label>
                <select name="status" class="w-full border-gray-300 rounded p-2">
                    <option value="pending">قيد التنفيذ</option>
                    <option value="in_progress">قيد العمل</option>
                    <option value="completed">مكتملة</option>
                </select>
            </div>


            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                حفظ
            </button>

            <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                رجوع
            </a>

        </form>

    </div>
@endsection
