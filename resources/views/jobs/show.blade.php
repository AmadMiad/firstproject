<x-layout>
<x-slot:titles>Job</x-slot:titles>

    <h2><strong>{{ $job['title'] }}</strong></h2>

    <p>
        this job pays {{ $job['salary'] }} per year, apply here:
    </p>

    <p class="mt-6">
        <x-buttom href="/jobs/{{ $job->id }}/edit">Edit job</x-buttom>
    </p>

</x-layout>

