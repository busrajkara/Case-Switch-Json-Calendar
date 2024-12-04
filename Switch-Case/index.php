<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haftalık Planlayıcı</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-calendar-alt"></i> Haftalık Planlayıcı</h1>
        <form method="GET" id="plan-form">
            <div class="form-group">
                <label for="day"><i class="fas fa-calendar-day"></i> Gün Seç:</label>
                <select name="day" id="day">
                    <option value="monday">Pazartesi</option>
                    <option value="tuesday">Salı</option>
                    <option value="wednesday">Çarşamba</option>
                    <option value="thursday">Perşembe</option>
                    <option value="friday">Cuma</option>
                    <option value="saturday">Cumartesi</option>
                    <option value="sunday">Pazar</option>
                </select>
            </div>
            <button type="submit"><i class="fas fa-search"></i> Plan Göster</button>
        </form>
        <div class="plan-output">
            <?php
                if (isset($_GET['day'])) {
                    $day = $_GET['day'];
                    switch ($day) {
                        case 'monday':
                            echo "<h2><i class='fas fa-dumbbell'></i> Pazartesi Planı</h2><p>Spor, toplantılar ve rapor hazırlama.</p>";
                            break;
                        case 'tuesday':
                            echo "<h2><i class='fas fa-book'></i> Salı Planı</h2><p>Alışveriş ve kitap okuma.</p>";
                            break;
                        case 'wednesday':
                            echo "<h2><i class='fas fa-code'></i> Çarşamba Planı</h2><p>Yazılım geliştirme ve eğitim.</p>";
                            break;
                        case 'thursday':
                            echo "<h2><i class='fas fa-project-diagram'></i> Perşembe Planı</h2><p>Proje sunumu ve spor.</p>";
                            break;
                        case 'friday':
                            echo "<h2><i class='fas fa-chart-line'></i> Cuma Planı</h2><p>Haftalık raporlama ve serbest zaman.</p>";
                            break;
                        case 'saturday':
                            echo "<h2><i class='fas fa-film'></i> Cumartesi Planı</h2><p>Aile ziyareti ve film izleme.</p>";
                            break;
                        case 'sunday':
                            echo "<h2><i class='fas fa-bed'></i> Pazar Planı</h2><p>Dinlenme ve hazırlık.</p>";
                            break;
                        default:
                            echo "<h2>Gün seçimi yapılmadı!</h2>";
                    }
                }
            ?>
        </div>
    </div>
    <section class="mini-calendar">
    <h2>Mini Takvim</h2>
    <div class="calendar-grid">
        <?php
        $year = date('Y'); 
        $month = date('m'); 
        $firstDayOfMonth = date('N', strtotime("$year-$month-01")); 
        $daysInMonth = date('t'); 

        $weekDays = ['Pzt', 'Sal', 'Çrş', 'Prş', 'Cuma', 'Cts', 'Pazar'];
        foreach ($weekDays as $day) {
            echo "<div class='day-name'>$day</div>";
        }

        for ($i = 1; $i < $firstDayOfMonth; $i++) {
            echo "<div class='day empty'></div>";
        }

        for ($day = 1; $day <= $daysInMonth; $day++) {
            echo "<div class='day' data-day='$day'>$day</div>";
        }
        ?>
    </div>
</section>

<section class="note-section">
    <div class="note-add">
        <h2>Not Ekle</h2>
        <textarea id="note" maxlength="180" placeholder="Notunuzu buraya yazın (maks. 180 karakter)"></textarea>
        <button id="save-note">Kaydet</button>
        <p id="note-status"></p>
    </div>
    <div class="note-display">
        <h2>Kayıtlı Notlar</h2>
        <div class="note-list">
            <?php
            $jsonFile = 'notes.json';
            $storedNotes = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

            if (!empty($storedNotes)) {
                foreach ($storedNotes as $day => $note) {
                    echo "<div><strong>Gün $day:</strong> $note</div>";
                }
            } else {
                echo "<p>Henüz kayıtlı bir not yok.</p>";
            }
            ?>
        </div>
    </div>
</section>

    <script src="script.js"></script>
</body>
</html>
