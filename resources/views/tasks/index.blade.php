@extends('layouts.app')

@section('title', 'جميع المهام')

@section('content')
    <div class="max-w-4xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">جميع المهام</h1>

        <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + إضافة مهمة
        </a>

        @if (session('success'))
            <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 bg-white shadow rounded">
            <table class="w-full text-right">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">العنوان</th>
                        <th class="p-3">الحالة</th>
                        <th class="p-3">العمليات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="border-b">
                            <td class="p-3">{{ $task->title }}</td>

                            <td class="p-3">
                                @if ($task->status === 'pending')
                                    <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded">
                                        قيد التنفيذ
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-green-200 text-green-800 rounded">
                                        مكتملة
                                    </span>
                                @endif
                            </td>


                            <td class="p-3 space-x-2 space-x-reverse">

                                <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:underline">عرض</a>

                                <a href="{{ route('tasks.edit', $task->id) }}"
                                    class="text-gray-700 hover:underline">تعديل</a>

                                <!-- 🔥 زر تغيير الحالة هنا بالضبط -->
                                <a href="{{ route('tasks.toggle', $task->id) }}" class="text-indigo-600 hover:underline">
                                    تغيير الحالة
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('هل أنت متأكد؟')">
                                        حذف
                                    </button>
                                </form>

                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
