<?php

class PhotoController extends BaseController
{
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        $responseData = "";

        if (strtoupper($requestMethod) == 'GET') {
            try {
                $photoModel = new PhotoModel();
                $intLimit = 10;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }

                $arrPhotos = $photoModel->getPhotos($intLimit);

                foreach ($arrPhotos as &$photo) {
                    $photo = [
                        'id' => $photo['id'],
                        'name' => $photo['name'],
                        'description' => $photo['description'],
                        'userLogin' => $photo['login'],
                        'publishDate' => $photo['date']
                    ];
                }

                $responseData = json_encode($arrPhotos);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array(
                    'Content-Type: application/json',
                    'HTTP/1.1 200 OK',
                    "Access-Control-Allow-Origin: https://localhost:5173",
                    "Access-Control-Allow-Methods: GET",
                    "Access-Control-Allow-Headers: Content-Type",
                    'Access-Control-Allow-Credentials: true',
                    'Access-Control-Max-Age: 86400'
                )
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}