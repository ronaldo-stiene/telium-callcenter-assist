<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CallcenterController extends Controller
{
    public function index(): View
    {
        return view('callcenter.index');
    }

    public function normal(Request $request): View
    {
        $text = $this->getText($request->name_checkbox, $request->name, "Nome: ");
        $text .= $this->getText($request->company_checkbox, $request->company, "Empresa: ");
        $text .= ($request->name_checkbox || $request->company_checkbox ) ? "<br>" : "";
        $text .= $this->getText($request->id_checkbox, $request->id, $request->id_type . ": ");
        $text .= $this->getText($request->event_checkbox, $request->event, "Evento: ");
        $text .= ($request->id_checkbox || $request->event_checkbox ) ? "<br>" : "";
        $text .= $this->getReason($request->reason_type, $request->reason);
        $text .= ($request->reason ) ? "<br>" : "";
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= $this->getText(true, str_replace("\n", "<br>", $request->details), "" );
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= ($request->phone_checkbox || $request->date_checkbox ) ? "<br>" : "";
        $text .= $this->getText($request->phone_checkbox, $request->phone, "Nº: ");
        $text .= $this->getText($request->date_checkbox, $request->date, "Data: ");

        $oneLine = "- " . $this->getOneLineText($text);

        $details = str_replace("\n", "<br>", $request->details);

        $invalidCall = false;

        return view('callcenter.show', compact('text', 'oneLine', 'details', 'invalidCall') );
    }

    public function invalid(Request $request): View
    {
        $text = $this->getText($request->name_checkbox, $request->name, "Nome: ");
        $text .= $this->getText($request->company_checkbox, $request->company, "Empresa: ");
        $text .= $this->getText($request->tran_checkbox, $request->tran, "Transferência: ");
        $text .= ($request->name_checkbox || $request->company_checkbox || $request->tran_checkbox) ? "<br>" : "";
        $text .= $this->getText(true, $request->reason, "" );
        $text .= ($request->reason ) ? "<br>" : "";
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= $this->getText(true, str_replace("\n", "<br>", $request->details), "" );
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= ($request->phone || $request->date ) ? "<br>" : "";
        $text .= $this->getText(true, $request->phone, "Nº: ");
        $text .= $this->getText(true, $request->date, "Data: ");

        $oneLine = $this->getOneLineText($text);

        $details = str_replace("\n", "<br>", $request->details);

        $invalidCall = true;

        return view('callcenter.show', compact('text', 'oneLine', 'details', 'invalidCall') );
    }

    private function getText($check, $value, $field): String
    {
        if ($check) {
            return "<p>". $this->insertText( $field . $value ) . "</p>\n";
        }
        return "";
    }

    private function getReasonText($value, $field, $type): String
    {
        if ($value) {
            return "<p>". $this->insertText( $field . $value) . "</p>\n";
        }
        return $type;
    }

    private function insertText($text): String
    {
        if (substr($text, -1) != ".") {
            return $text . ".";
        }
        return $text;
    }

    private function getOneLineText($text)
    {
        $newText = str_replace("<br>", "", $text);
        $newText = str_replace("\n", "", $newText);
        $newText = str_replace("<hr>", "", $newText);
        $newText = str_replace("<p>", "", $newText);
        $newText = str_replace("</p>", " ", $newText);
        return $newText;
    }

    private function getReason($type, $reason): String
    {
        if ($type == "rds") {
            return $this->getReasonText($reason, "RDS: ", "Requisição de Serviço");
        }
        if ($type == "in") {
            return $this->getReasonText($reason, "IN: ", "Incidente");
        }
        if ($type == "tran") {
            return $this->getReasonText($reason, "Transferência: ", "Transferência de Ligação");
        }
    }
}
