<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $day = $_POST['day'];
    $note = $_POST['note'];

    if (!empty($day) && strlen($note) <= 180) {
        // Notları kaydetmek için JSON dosyasını kullan
        $jsonFile = 'notes.json';
        $storedNotes = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];
        
        // Seçilen günü güncelle
        $storedNotes[$day] = $note;

        // JSON dosyasını güncelle
        file_put_contents($jsonFile, json_encode($storedNotes, JSON_PRETTY_PRINT));
        
        echo json_encode(['status' => 'success', 'message' => 'Not başarıyla kaydedildi!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Geçerli bir not ekleyin!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek.']);
}
