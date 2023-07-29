
<?php
function groupFilesIntoSubfolders($files) {
    // Get all the .txt files in the source folder
    $files = glob($files . '/*.txt');

    // Group files by language and move them into sub-folders
    foreach ($files as $file) {
        // Extract the language name from the file name
        $language = explode('-', basename($file, '.txt'))[0];

        // Create the target sub-folder based on the language
        $targetFolder = $files . '/' . $language;
        if (!is_dir($targetFolder)) {
            mkdir($targetFolder);
        }

        // Move the file into its corresponding sub-folder
        rename($file, $targetFolder . '/' . basename($file));
    }
}


$files = './files/';
//call the function 
groupFilesIntoSubfolders($files);
?>