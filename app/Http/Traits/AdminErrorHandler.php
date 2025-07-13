<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

trait AdminErrorHandler
{
    /**
     * Handle errors for admin operations
     * 
     * @param callable $callback
     * @param Request $request
     * @param string $successMessage
     * @param string $errorMessage
     * @param string $redirectRoute
     * @return mixed
     */
    protected function handleAdminOperation(callable $callback, Request $request, string $successMessage = 'İşlem başarıyla tamamlandı', string $errorMessage = 'Bir hata oluştu', string $redirectRoute = null)
    {
        try {
            $result = $callback();
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                    'data' => $result
                ]);
            }
            
            if ($redirectRoute) {
                return redirect()->route($redirectRoute)->with('success', $successMessage);
            }
            
            return back()->with('success', $successMessage);
            
        } catch (Throwable $e) {
            // Log the error
            Log::error('Admin Operation Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
                'user_id' => auth()->id(),
                'ip' => $request->ip(),
                'url' => $request->url()
            ]);
            
            $errorMessage = $errorMessage . ': ' . $e->getMessage();
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', $errorMessage)->withInput();
        }
    }
    
    /**
     * Handle index operations (listing)
     */
    protected function handleIndexOperation(callable $callback, Request $request, string $errorMessage = 'Veriler yüklenirken bir hata oluştu')
    {
        try {
            return $callback();
        } catch (Throwable $e) {
            Log::error('Admin Index Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
                'url' => $request->url()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage . ': ' . $e->getMessage()
                ], 500);
            }
            
            return view('admin.error', [
                'error' => $errorMessage . ': ' . $e->getMessage(),
                'back_url' => route('admin.dashboard')
            ]);
        }
    }
    
    /**
     * Handle show operations
     */
    protected function handleShowOperation(callable $callback, Request $request, string $errorMessage = 'Kayıt görüntülenirken bir hata oluştu')
    {
        try {
            return $callback();
        } catch (Throwable $e) {
            Log::error('Admin Show Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
                'url' => $request->url()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage . ': ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', $errorMessage . ': ' . $e->getMessage());
        }
    }
    
    /**
     * Handle store operations
     */
    protected function handleStoreOperation(callable $callback, Request $request, string $successMessage = 'Kayıt başarıyla oluşturuldu', string $errorMessage = 'Kayıt oluşturulurken bir hata oluştu', string $redirectRoute = null)
    {
        return $this->handleAdminOperation($callback, $request, $successMessage, $errorMessage, $redirectRoute);
    }
    
    /**
     * Handle update operations
     */
    protected function handleUpdateOperation(callable $callback, Request $request, string $successMessage = 'Kayıt başarıyla güncellendi', string $errorMessage = 'Kayıt güncellenirken bir hata oluştu', string $redirectRoute = null)
    {
        return $this->handleAdminOperation($callback, $request, $successMessage, $errorMessage, $redirectRoute);
    }
    
    /**
     * Handle destroy operations
     */
    protected function handleDestroyOperation(callable $callback, Request $request, string $successMessage = 'Kayıt başarıyla silindi', string $errorMessage = 'Kayıt silinirken bir hata oluştu', string $redirectRoute = null)
    {
        return $this->handleAdminOperation($callback, $request, $successMessage, $errorMessage, $redirectRoute);
    }
} 