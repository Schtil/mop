<?php namespace Schtil\Onevago\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use October\Rain\Exception\ApplicationException;
use Schtil\Onevago\Classes\Collection\TourCollection;
use Schtil\Onevago\Models\Tour;

/**
 * Class TourList
 * @package Schtil\Onevago\Components
 */
class TourList extends ComponentBase
{
    /**
     * Component details
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'schtil.onevago::lang.component.tour_list_name',
            'description' => 'schtil.onevago::lang.component.tour_list_description',
        ];
    }

    /**
     * Make element collection
     */
    public function make()
    {
        $tour = Tour::where('id', ">", "0");
        if(isset($_GET["sQuery"]))
            if($_GET["sQuery"] != "")
                $tour = Tour::where("location", "like", "%".$_GET["sQuery"]."%");
        if(isset($_GET["startDate"]))
            if($_GET["startDate"] != "") {
                $tour = $tour->where("start_date", "<", date("Y-m-d", strtotime($_GET["startDate"])));
                $tour = $tour->where("end_date", ">", date("Y-m-d", strtotime($_GET["startDate"])));
            }
        if(isset($_GET["endDate"]))
            if($_GET["endDate"] != "") {
                $tour = $tour->where("end_date", ">=", date("Y-m-d", strtotime($_GET["endDate"])));
                $tour = $tour->where("start_date", "<=", date("Y-m-d", strtotime($_GET["endDate"])));
            }
        return $tour->paginate(10);
    }

    public function find($id = "default")
    {
        if($id == "default") {
            return $this->getAnswer("error");
        }
        $tour = Tour::find($id);
        if(!$tour) {
            return $this->getAnswer("error");
        }
        return $this->getAnswer("ok",$tour);
    }
    private function getAnswer($status, $data = "/")
    {
        $answer = ["status" => $status];
        if($data == "/")
            $answer["url"] = Redirect::to("/")->getTargetUrl();
        else
            $answer["data"] = $data;
        return $answer;
    }

    /**
     * Method for ajax request with empty response
     * @return bool
     */
    public function onAjaxRequest()
    {
        return true;
    }

    public function onRun()
    {
        if($this->paramName("tour_id") == "default")
            return Response::make('Page not found', 404);
    }
}
