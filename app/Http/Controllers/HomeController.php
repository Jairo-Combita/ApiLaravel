<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{


    public function index(Request $request){      
        try {
            if($request->ajax()){
                $id = (string) $request->id;
                $response = Http::get('https://jsonplaceholder.typicode.com/todos/'.$id);
                $usuarios = $response->json();
    
                if(count($usuarios) > 0){
                    $arrResponse = array('status' => true, 'data' => $usuarios);
                }else{
                    $arrResponse = array('status' => false, 'data' => $usuarios);
                }    
                return $arrResponse;
            }
        } catch (Exception $e) {
            
        }
        
    }



    public function create(Request $request){
        try {
            if($request->ajax()){
                $id = (string) $request->id;
                $titulo = $request->titulo;
                $estado = $request->estado;


                $response = Http::withHeaders([
                    'Content-type'=> 'application/json',
                ])->post('https://jsonplaceholder.typicode.com/todos' , [
                    'userId'=> $id,
                    'title'=> $titulo,
                    'completed'=> $estado                    
                ]);
               
                $usuarios = $response->json();                
                if(count($usuarios) > 0){
                    $arrResponse = array('status' => true, 'data' => $usuarios);
                }else{
                    $arrResponse = array('status' => false, 'data' => $usuarios);
                }    
                  
                                           
                return $arrResponse;
            }
            
        } catch (Exception $e) {
            
        }
    }

    

    public function update(Request $request){
        try {
            if($request->ajax()){
                $id = (string) $request->id;
                $titulo = $request->titulo;
                $estado = $request->estado;


                $response = Http::withHeaders([
                    'Content-type'=> 'application/json',
                ])->put('https://jsonplaceholder.typicode.com/todos/'.$id , [
                    'id'=> $id,
                    'title'=> $titulo,
                    'completed'=> $estado                    
                ]);
               
                $usuarios = $response->json();


                if(count($usuarios) > 0){
                    $arrResponse = array('status' => true, 'data' => $usuarios);
                }else{
                    $arrResponse = array('status' => false, 'data' => $usuarios);
                }      
                                           
                return $arrResponse;
            }
            
        } catch (Exception $e) {
            
        }
    }






    public function delete(Request $request){
        try {
            if($request->ajax()){
                $id = (string) $request->id;
                $response = Http::delete('https://jsonplaceholder.typicode.com/todos/'.$id);
                $usuarios = $response->json();

                if(count($usuarios) > 0){
                    $arrResponse = array('status' => false, 'data' => $usuarios);
                }else{
                    $arrResponse = array('status' => true, 'data' => $usuarios);
                }              
                return $arrResponse;
            }            
        } catch (Exception $e) {
            
        }        
    }




}
