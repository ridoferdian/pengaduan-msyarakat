@foreach ($instansis as $instansi)
<tr class="odd:bg-slate-100 even:bg-white">
    <td class="px-4 py-2 border-t-2 border-gray-300">{{ $instansi->parent }}</td>
    <td class="px-4 py-2 border-t-2 border-gray-300" >
        <a href="{{ route('instansi.show', $instansi->slug) }}" class="text-blue-600 hover:underline">
            {{ $instansi->name }}
        </a>
    </td>
    <td class="px-4 py-2 border-t-2 border-gray-300">{{ $instansi->type }}</td>
    <td class="px-4 py-2 border-t-2 border-gray-300">{{ $instansi->prefix_sms }}</td>
</tr>
@endforeach
