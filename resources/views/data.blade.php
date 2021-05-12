<x-layout>
    <x-slot name="title">Data</x-slot>
    <x-slot name="subtitle">View all your data here</x-slot>
    <x-slot name="imports">
        <script src="{{ asset('js/data.js') }}" defer></script>
    </x-slot>

    <table id="dataTable" class="table">
        <thead>
            <tr>
                <th onclick="sortTable(0)" style="cursor: pointer;">ID</th>
                <th onclick="sortTable(1)" style="cursor: pointer;">Type</th>
                <th onclick="sortTable(2)" style="cursor: pointer;">Name</th>
                <th onclick="sortTable(3)" style="cursor: pointer;">Magento ID</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->type }}</td>
                    <td>{{ $entry->NAME }}</td>
                    <td>{{ $entry->magento_id }}</td>
                    <td onclick="deleteData({{ $entry->id }})">Remove</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{!! url('/data/create') !!}" method="post">
        @csrf

        <div class="columns">
            <div class="column">
                <input class="input" type="text" placeholder="Type" name="type" >
                {{ $errors->first('type') }}
            </div>

            <div class="column">
                <input class="input" type="text" placeholder="Name" name="name" >
                {{ $errors->first('name') }}
            </div>

            <div class="column">
                <input class="input" type="text" placeholder="Magento ID" name="magento_id" >
                {{ $errors->first('magento_id') }}
            </div>
            
            <div class="column">
                <button class="button is-primary" type="submit">Insert</button>
            </div>
        </div>

        {{ $errors->first('db') }}
    </form>
</x-layout>
