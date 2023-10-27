<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Ifsnop\Mysqldump\Mysqldump;

class Utility extends BaseController
{
    public function index()
    {
        return view('utility/index');
    }

    public function doBackup()
{
   try {
     // Generate a unique backup file name based on the current date.
     $tglSekarang = date('dmY'); // Format: ddmmyyyy

     // Path to the backup directory.
     $backupDirectory = 'database/backup/';
 
     // Full path to the backup file, including the directory.
     $backupFilePath = $backupDirectory . 'dbbackup' . $tglSekarang . '.sql';
 
     // Check if the backup directory exists, and if not, create it.
     if (!is_dir($backupDirectory)) {
         mkdir($backupDirectory, 0755, true);
     }
 
     // Execute the MySQL dump and save the backup to the specified file.
     $dumb = new Mysqldump('mysql:host=localhost;dbname=dbgudang;port=3306', 'root', '');
     $dumb->start($backupFilePath);
 
     $pesan = "Backup berhasil ...";
     session()->setFlashdata('pesan',$pesan);
     // Redirect to the desired page after a successful backup.
     return redirect()->to('/utility/index');


   } catch (\Exception $e) {
    $pesan = "mysqldumb-php error".$e->getMessage();
    session()->setFlashdata('pesan',$pesan);
    return redirect()->to('/utility/index');
   }
}

}