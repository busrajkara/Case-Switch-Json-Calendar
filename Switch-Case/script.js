document.getElementById('plan-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const day = document.getElementById('day').value;
    window.location.href = `index.php?day=${day}`;
});

document.addEventListener('DOMContentLoaded', () => {
    const days = document.querySelectorAll('.calendar-grid .day');
    const noteTextarea = document.getElementById('note');
    const saveButton = document.getElementById('save-note');
    const noteStatus = document.getElementById('note-status');
    let selectedDay = null;

    days.forEach(day => {
        day.addEventListener('click', function () {
            selectedDay = this.dataset.day;
            fetch('notes.json')
                .then(response => response.json())
                .then(data => {
                    noteTextarea.value = data[selectedDay] || '';
                    noteStatus.textContent = `Seçili Gün: ${selectedDay}`;
                })
                .catch(err => {
                    noteTextarea.value = '';
                    noteStatus.textContent = 'Not yüklenemedi!';
                });
        });
    });

    saveButton.addEventListener('click', () => {
        if (!selectedDay) {
            alert('Lütfen önce bir gün seçin!');
            return;
        }

        const note = noteTextarea.value.trim();
        if (note.length > 180) {
            alert('Not en fazla 180 karakter olmalıdır!');
            return;
        }

        fetch('notes.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `day=${selectedDay}&note=${encodeURIComponent(note)}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    noteStatus.textContent = `Gün ${selectedDay} için not kaydedildi!`;
                    noteTextarea.value = '';
                } else {
                    alert(data.message);
                }
            })
            .catch(() => {
                alert('Bir hata oluştu!');
            });
    });
});
