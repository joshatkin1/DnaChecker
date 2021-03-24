<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\DnaChecker as DnaChecker;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\UnreadableFileException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

class DnaCheckerController extends Controller
{

    final public function runTest(DnaChecker $dnaChecker){
        try{

            $dnaChecker->getDnaInputFileContents();
            $dnaChecker->removeDnaInputFileEmptyLines();
            $dnaChecker->checkDnaFileFormat();
            $output_file_content = $dnaChecker->generateDnaFileResultsContent();

            return  response($output_file_content, 200);

        }catch(FileNotFoundException $exception){
          return view('exception', ['errors' => $exception->getMessage()]);
        }catch(ExtensionFileException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }catch(UnreadableFileException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }
    }
}
