<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practical test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-full">
        <div class="w-1/3 mx-auto border border-gray-700 rounded-lg p-5 mt-20">
            <h2 class="font-bold text-xl text-center mb-6">Upload image</h2>
            <form action="{{ route('image.create') }}" method="post" class="flex flex-col gap-y-5" enctype="multipart/form-data">
                @csrf
                <div>
                    <input name="image" type="file" class="w-full border rounded border-gray-700" accept="image/*">
                </div>
                <div class="mx-auto">
                    <input type="submit" class="w-full p-2 border rounded bg-green-500 border-gray-700 max-w-[5rem]">
                </div>
            </form>
        </div>
        @if ($errors->any())
            <div class="w-1/3 mx-auto rounded-lg p-5 mt-5 text-red-500">
                <ul class="list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>

</html>
