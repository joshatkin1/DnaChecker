<?php

namespace App\Http\Controllers;

use App\Interfaces\DnaCheckerInterface;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\UnreadableFileException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

class DnaCheckerController extends Controller
{

    public function runTest(DnaCheckerInterface $dnaChecker){
        try{

            $dnaChecker->getDnaInputFileContents();
            $dnaChecker->removeDnaInputFileEmptyLines();
            $dnaChecker->checkDnaFileFormat();
            $output_file_content = $dnaChecker->generateDnaFileResultsContent();

            return view('dnacheckerresult')->with('output_file_content', $output_file_content);

        }catch(FileNotFoundException $exception){
          return view('exception', ['errors' => $exception->getMessage()]);
        }catch(ExtensionFileException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }catch(UnreadableFileException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }
    }
}
