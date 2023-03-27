<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;
class gcp_config extends CI_Model
{
    // Please use your own private key (JSON file content) which was downloaded in step 3 and copy it here
    // your private key JSON structure should be similar like dummy value below.
    // WARNING: this is only for QUICK TESTING to verify whether private key is valid (working) or not.  
    // NOTE: to create private key JSON file: https://console.cloud.google.com/apis/credentials  
    
    /*
    * NOTE: if the server is a shared hosting by third party company then private key should not be stored as a file,
    * may be better to encrypt the private key value then store the 'encrypted private key' value as string in database,
    * so every time before use the private key we can get a user-input (from UI) to get password to decrypt it.
    */
    
    function uploadFile($bucketName, $fileContent, $cloudPath) {
        $privateKeyFileContent = file_get_contents("./application/storage_cred.json") or die('cred file not found!');
        // connect to Google Cloud Storage using private key as authentication
        try {
            $storage = new StorageClient([
                'keyFile' => json_decode($privateKeyFileContent, true)
            ]);
        } catch (Exception $e) {
            // maybe invalid private key ?
            print $e;
            return false;
        }
    
        // set which bucket to work in
        $bucket = $storage->bucket($bucketName);
    
        // upload/replace file 
        $storageObject = $bucket->upload(
                $fileContent,
                ['name' => $cloudPath]
                // if $cloudPath is existed then will be overwrite without confirmation
                // NOTE: 
                // a. do not put prefix '/', '/' is a separate folder name  !!
                // b. private key MUST have 'storage.objects.delete' permission if want to replace file !
        );
    
        // is it succeed ?
        return $storageObject != null;
    }
    
    function getFileInfo($bucketName, $cloudPath) {
        $privateKeyFileContent = file_get_contents("./application/storage_cred.json");
        // connect to Google Cloud Storage using private key as authentication
        try {
            $storage = new StorageClient([
                'keyFile' => json_decode($privateKeyFileContent, true)
            ]);
        } catch (Exception $e) {
            // maybe invalid private key ?
            print $e;
            return false;
        }
    
        // set which bucket to work in
        $bucket = $storage->bucket($bucketName);
        $object = $bucket->object($cloudPath);
        return $object->info();
    }
    //this (listFiles) method not used in this example but you may use according to your need 
    function listFiles($bucket, $directory = null) {
    
        if ($directory == null) {
            // list all files
            $objects = $bucket->objects();
        } else {
            // list all files within a directory (sub-directory)
            $options = array('prefix' => $directory);
            $objects = $bucket->objects($options);
        }
    
        foreach ($objects as $object) {
            print $object->name() . PHP_EOL;
            // NOTE: if $object->name() ends with '/' then it is a 'folder'
        }
    }
}
?>