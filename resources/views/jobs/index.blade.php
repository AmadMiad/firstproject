<x-layout>
<x-slot:titles>Jobs</x-slot:titles>

    <div class = "space-y-4">
        @foreach($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class = "block px-4 py-6 border border-gray-300 rounded-lg ">
                <div class= "font-bold text-blue-400 text-sm">
                    {{ $job->employer->name }}
                </div>
                <div>
                <strong>{{ $job['title'] }}:</strong> pays {{ $job['salary'] }}$
                </div>
            </a>
        @endforeach

    </div>

    <div>
        {{ $jobs ->links() }}
    </div>

</x-layout>

