

    <?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
})->name('logouti');



Route::group(['prefix' => '/home', 'namespace' => 'System', 'middleware' => ['auth']], function ()
{

// Dashboard : Start

    Route::get('/', 'DashboardController@index')->name('Dashboard');

// Dashboard : End

// Raw Material : Start

    Route::group(['prefix' => '/rawMaterial' , 'namespace' => 'Inventory'] , function ()
    {
        Route::get('/' , 'RawMaterialController@create')->name('InventoryRawMaterials');
        Route::post('/' , 'RawMaterialController@store')->name('RawMaterialStore');
        Route::get('/{rawMaterial_id}/edit' , 'RawMaterialController@edit')->name('RawMaterialEdit');
        Route::get('/{rawMaterial_id}/destroy' , 'RawMaterialController@destroy')->name('RawMaterialDestroy');
    });

// Raw Material : End

///////////////////////////////////////////////////

// Piece : Start

Route::group(['prefix' => '/piece' , 'namespace' => 'Inventory'] , function ()
{
    Route::get('/' , 'PieceController@create')->name('InventoryPieces');
    Route::post('/' , 'PieceController@store')->name('PieceStore');
    Route::get('/{piece_id}/edit' , 'PieceController@edit')->name('PieceEdit');
    Route::get('/{piece_id}/destroy' , 'PieceController@destroy')->name('PieceDestroy');
});

// Piece : End

///////////////////////////////////////////////////

// Customer : Start

Route::group(['prefix' => '/customer' , 'namespace' => 'Inventory'] , function ()
{
    Route::get('/' , 'CustomerController@create')->name('InventoryCustomers');
    Route::post('/' , 'CustomerController@store')->name('CustomerStore');
    Route::get('/{customer_id}/edit' , 'CustomerController@edit')->name('CustomerEdit');
    Route::get('/{customer_id}/destroy' , 'CustomerController@destroy')->name('CustomerDestroy');
});

// Customer : End

///////////////////////////////////////////////////

// Contract : Start

Route::group(['prefix' => '/contract' , 'namespace' => 'Inventory'] , function ()
{
    Route::get('/' , 'ContractController@create')->name('InventoryContracts');
    Route::post('/' , 'ContractController@store')->name('ContractStore');
    Route::get('/{contract_id}/edit' , 'ContractController@edit')->name('ContractEdit');
    Route::get('/{contract_id}/destroy' , 'ContractController@destroy')->name('ContractDestroy');
});

// Contract : End

///////////////////////////////////////////////////

// Repository : Start

Route::group(['prefix' => '/repository' , 'namespace' => 'Inventory'] , function ()
{
    Route::get('/' , 'RepositoryController@create')->name('InventoryRepositories');
    Route::post('/' , 'RepositoryController@store')->name('RepositoryStore');
    Route::get('/{repository_id}/edit' , 'RepositoryController@edit')->name('RepositoryEdit');
    Route::get('/{repository_id}/destroy' , 'RepositoryController@destroy')->name('RepositoryDestroy');
});

// Repository : End

///////////////////////////////////////////////////

// Contractor : Start

Route::group(['prefix' => '/contractor' , 'namespace' => 'Inventory'] , function ()
{
    Route::get('/' , 'ContractorController@create')->name('InventoryContractors');
    Route::post('/' , 'ContractorController@store')->name('ContractorStore');
    Route::get('/{contractor_id}/edit' , 'ContractorController@edit')->name('ContractorEdit');
    Route::get('/{contractor_id}/destroy' , 'ContractorController@destroy')->name('ContractorDestroy');
});

// Contractor : End

///////////////////////////////////////////////////

// Production Stage : Start

Route::group(['prefix' => '/production' , 'namespace' => 'Inventory'] , function ()
{
// لیست قراردادها و اختصاص انبار 

    Route::get('/' , 'ProductionStageController@index')->name('InventoryProductionStage'); 
    
    Route::group(['prefix' => '/allocateRepository'] , function ()
    {
        Route::get('/contract:{contract_id}/','ProductionStageController@create')->name('AllocateRepositories');    
        Route::post('/{contract_id}/' , 'ProductionStageController@store')->name('AllocateRepositoryStore');      
        Route::get('/{stage_id}/destroy' , 'ProductionStageController@destroy')->name('AllocateRepositoryDestroy');

    // لیست پیمانکاران و اختصاص آنها

        Route::group(['prefix' => '/allocateContractor'] , function ()
        {
            Route::get('/stage:{stage_id}/','AllocateContractorController@create')->name('AllocateContractors');    
            Route::post('/{stage_id}/' , 'AllocateContractorController@store')->name('AllocateContractorStore');
            Route::get('/{allocateContractor_id}/destroy' , 'AllocateContractorController@destroy')
                ->name('AllocateContractorDestroy');

        // نمایش فرم ثبت قرارداد با پیمانکار

            Route::group(['prefix' => '/contractorContract'] , function ()
            {
                Route::get('allocateContractor:{allocateContractor_id}/signing','ContractorContractController@create')
                    ->name('ContractorContractSigning');    
                Route::post('/{allocateContractor_id}/','ContractorContractController@store')->name('ContractorContractStore');
                Route::get('contractorContract:{contractorContract_id}/edit','ContractorContractController@edit')
                    ->name('ContractorContractEdit');
                Route::get('contractorContract:{contractorContract_id}/destroy','ContractorContractController@destroy')
                    ->name('ContractorContractDestroy');
            
            // مشاهده ی جزییات قرارداد

                Route::group(['prefix' => '/details'] , function ()
                {
                    Route::get('contractorContract:{contractorContract_id}','ContractorContractController@details')
                        ->name('ContractorContractDetails');
                    
                // ورودی انبار : مواد اولیه  
                    Route::group(['prefix' => '/inputRawMaterial'] , function ()
                    {
                      
                        Route::get('contractorContract:{contractorContract_id}','DetailsContractorController@inputRawMaterial')
                            ->name('ContractorInputRawMaterial'); 

                        Route::post('contractorContract:{contractorContract_id}','DetailsContractorController@inputRawMaterialStore')
                            ->name('ContractorInputRawMaterialStore');   
                                                     
                        Route::get('contractorInputRawMaterial:{contractorInputRawMaterial_id}/edit','DetailsContractorController@inputRawMaterialEdit')
                            ->name('ContractorInputRawMaterialEdit');
                        
                        Route::get('contractorInputRawMaterial:{contractorInputRawMaterial_id}/destroy','DetailsContractorController@inputRawMaterialDestroy')
                            ->name('ContractorInputRawMaterialDestroy');

                    });

                // ورودی انبار : قطعات تولید شده
                    Route::group(['prefix' => '/inputPiece'] , function ()
                    {
                    
                        Route::get('contractorContract:{contractorContract_id}','DetailsContractorController@inputPiece')
                            ->name('ContractorInputPiece'); 

                        Route::post('contractorContract:{contractorContract_id}','DetailsContractorController@inputPieceStore')
                            ->name('ContractorInputPieceStore');   
                                                    
                        Route::get('contractorInputPiece:{contractorInputRawMaterial_id}/edit','DetailsContractorController@inputPieceEdit')
                            ->name('ContractorInputPieceEdit');
                        
                        Route::get('contractorInputPiece:{contractorInputRawMaterial_id}/destroy','DetailsContractorController@inputPieceDestroy')
                            ->name('ContractorInputPieceDestroy');
                
                // نمایش لیست ورودی ها
                        Route::get('contractorInputPiece:{contractorInputRawMaterial_id}/view','DetailsContractorController@inputPieceView')
                            ->name('ContractorInputPieceView');
                    });

                }); // details
            
            }); // contractorContract  

        
        
        }); // allocateContractor

    }); // allocateRepository
    
    


// Allocate Contractor : Start
// لیست پیمانکاران و اختصاص آنها 

    

// Allocate Contractor : End

// Contractor Contract : Start
// نمایش فرم ثبت قرارداد با پیمانکار  

    
    
    


// Contractor Contract : End   





});




// Production Stage : End

///////////////////////////////////////////////////

// Allocate Contractor : Start

Route::group(['namespace' => 'Inventory'] , function ()
{
// لیست پیمانکاران و اختصاص آنها 

    // Route::get('/{stage_id}/allocateContractor' , 'AllocateContractorController@allocateContractor')
    //         ->name('AllocateContractors');    
    // Route::post('/{stage_id}/' , 'AllocateContractorController@store')->name('AllocateContractorStore');
    // Route::get('/{allocateContractor_id}/destroy' , 'AllocateContractorController@destroy')
    //         ->name('AllocateContractorDestroy');
});

// Allocate Contractor : End

///////////////////////////////////////////////////

// Contractor Contract : Start

// Route::group(['namespace' => 'Inventory'] , function ()
// {
// // نمایش فرم ثبت قرارداد با پیمانکار  

//     Route::get('allocateContractor:{allocateContractor_id}/signing','ContractorContractController@create')
//             ->name('ContractorContractSigning');    
//     Route::post('/{allocateContractor_id}/','ContractorContractController@store')->name('ContractorContractStore');
//     Route::get('contractorContract:{contractorContract_id}/edit','ContractorContractController@edit')
//             ->name('ContractorContractEdit');
    
// // مشاهده ی جزییات قرارداد
//     Route::get('contractorContract:{contractorContract_id}/details','ContractorContractController@details')
//             ->name('ContractorContractDetails');

    
// });

// Contractor Contract : End

///////////////////////////////////////////////////








// Route::group(['prefix' => '/allocateRepository', 'namespace' => 'Inventory'] , function ()
// {
// // نمایش لیست پیمانکاران و اختصاص آنها 
//     Route::get('/{$stage_id}/allocateContractor' , 'AllocateContractorController@allocateContractor')
//         ->name('AllocateContractors');
    
// });

// Production Stage : End

///////////////////////////////////////////////////











    
// // Production Stage : Start
    
//     Route::group(['prefix' => '/production', 'namespace' => 'Inventory'] , function ()
//     {
//         Route::get('/' , 'ProductionStageController@index')->name('InventoryProductionStage');

//         Route::get('/{contract_id}/allocateRepository' , 'ProductionStageController@create')
//             ->name('AllocateRepository');

//         Route::post('/{contract_id}/' , 'ProductionStageController@store')
//             ->name('InventoryProductionStageStore');

//         Route::get('/{stage_id}/destroy' , 'ProductionStageController@destroy')
//             ->name('InventoryProductionStageDestroy');

        
//     // Allocate Contractor : Start

//         Route::group(['prefix' => '/allocateContractor'] , function ()
//         {
//             Route::get('/{stage_id}/' , 'AllocateContractorController@create')
//                 ->name('InventoryAllocateContractors');

//             Route::post('/{stage_id}/' , 'AllocateContractorController@store')
//                 ->name('InventoryAllocateContractorStore');

//             // Route::get('/{allocateContractor_id}/' , 'AllocateContractorController@destroy')
//             //     ->name('InventoryContractorContractDestroy');

//         // Contractor Contract : Start

//             Route::group(['prefix' => '/contractorContract'] , function ()
//             {
//                 Route::get('/{allocateContractor_id}/signing' , 'ContractorContractController@create')
//                     ->name('InventoryContractorContractSigning');

//                 Route::post('/{allocateContractor_id}/' , 'ContractorContractController@store')
//                     ->name('InventoryContractorContractStore');

//                 Route::get('/{contractorContract_id}/' , 'ContractorContractController@edit')
//                     ->name('InventoryContractorContractEdit');

//             // مشاهده جزییات                    
//                 Route::group(['prefix' => '/details'] , function ()
//                 {
//                     Route::get('/{contractorContract_id}/details' , 'ContractorContractController@details')
//                         ->name('InventoryContractorContractDetails');
                    
//                 // مواد اولیه
//                     Route::get('/{contractorContract_id}/' , 'ContractorContractController@inputRawMaterial')
//                         ->name('InventoryContractorInputRawMaterial');

//                 // مواد اولیه                             
//                     Route::group(['prefix' => '/inputRawMaterial'] , function ()
//                     {
//                         Route::post('/{contractorContract_id}/' , 'ContractorContractController@storeInputRawMaterial')
//                             ->name('InventoryContractorContractStoreInputRawMaterial');

//                         Route::get('/{contractorContract_id}/' , 'ContractorContractController@InputRawMaterialPrint')
//                             ->name('InventoryContractorContractInputRawMaterialPrint');
//                     });
                
//                 });

//             });

//         // Contractor Contract : End

//         });

//     // Allocate Contractor : End

//     });

// // Production Stage : End
        











});

