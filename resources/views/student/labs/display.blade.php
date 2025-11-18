<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Display {{ $room->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { background: #0f172a; }
    </style>
</head>

<body class="text-white">

<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-4xl font-bold mb-6 text-center">
        {{ $room->name }}
    </h1>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        <table class="w-full text-gray-200" id="display-table">
            <thead>
                <tr class="border-b border-gray-600">
                    <th class="py-3 text-left text-lg">Jam ke</th>
                    <th class="py-3 text-left text-lg">Waktu</th>
                    <th class="py-3 text-left text-lg">Kelas</th>
                    <th class="py-3 text-left text-lg">Guru</th>
                    <th class="py-3 text-left text-lg">Mapel</th>
                </tr>
            </thead>

            <tbody id="display-body">
                <tr><td colspan="5" class="py-4 text-center text-gray-400">Memuat...</td></tr>
            </tbody>
        </table>
    </div>

</div>

<script>
    function refreshDisplay() {
        const day = "{{ strtolower(now()->locale('id')->dayName) }}";

        fetch(`{{ url('/student/labs/'.$room->id.'/day') }}/${day}`)
            .then(res => res.json())
            .then(data => {
                let html = "";
                const now = new Date();
                const minutesNow = now.getHours() * 60 + now.getMinutes();

                data.forEach(row => {
                    const [sH, sM] = row.start_time.split(":");
                    const [eH, eM] = row.end_time.split(":");

                    const startMin = parseInt(sH)*60 + parseInt(sM);
                    const endMin   = parseInt(eH)*60 + parseInt(eM);

                    const isNow = minutesNow >= startMin && minutesNow < endMin;

                    html += `
                        <tr class="border-b border-gray-700 ${isNow ? 'bg-green-700 text-white' : ''}">
                            <td class="py-3">${row.lesson_number}</td>
                            <td class="py-3">${row.start_time.substring(0,5)} - ${row.end_time.substring(0,5)}</td>
                            <td class="py-3">${row.class_group.name}</td>
                            <td class="py-3">${row.teacher.name}</td>
                            <td class="py-3">${row.subject.name}</td>
                        </tr>
                    `;
                });

                document.getElementById("display-body").innerHTML = html;
            });
    }

    refreshDisplay();
    setInterval(refreshDisplay, 30000); // refresh tiap 30 detik
</script>

</body>
</html>
