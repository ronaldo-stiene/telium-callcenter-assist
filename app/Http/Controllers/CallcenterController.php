<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * -----------------------------------------------------------------------
 * Controller do Formulário de Chamadas
 * -----------------------------------------------------------------------
 * 
 * Esta classe contém os métodos controladores para as operações lógicas 
 * do formulrio de chamadas.
 * 
 * @author Ronaldo Stiene <ronaldo.stiene@outlook.com>
 * @since 18/02/2020
 * @version v1.0.0
 */
class CallcenterController extends Controller
{
    /**
     * Exibe a view principal
     *
     * @return View
     */
    public function index(): View
    {
        return view('callcenter.index');
    }

    /**
     * Gera o texto e retorna a view de documentação de uma chamada normal.
     *
     * @param Request $request
     * @return View
     */
    public function normal(Request $request): View
    {
        $text = $this->getTextLine($request->name_checkbox, $request->name, "Nome: ");
        $text .= $this->getTextLine($request->company_checkbox, $request->company, "Empresa: ");
        $text .= ($request->name_checkbox || $request->company_checkbox ) ? "<br>" : "";
        $text .= $this->getTextLine($request->id_checkbox, $request->id, $request->id_type . ": ");
        $text .= $this->getTextLine($request->event_checkbox, $request->event, "Evento: ");
        $text .= ($request->id_checkbox || $request->event_checkbox ) ? "<br>" : "";
        $text .= $this->getReason($request->reason_type, $request->reason);
        $text .= ($request->reason ) ? "<br>" : "";
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= $this->getTextLine(true, str_replace("\n", "<br>", $request->details), "" );
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= ($request->phone_checkbox || $request->date_checkbox ) ? "<br>" : "";
        $text .= $this->getTextLine($request->phone_checkbox, ($request->phone_country == "us") ? "+1 " . $request->phone : $request->phone, "Nº: ");
        $text .= $this->getTextLine($request->date_checkbox, $request->date, "Data: ");

        $oneLine = "- " . $this->getOneLineText($text);

        $details = str_replace("\n", "<br>", $request->details);

        $invalidCall = false;

        return view('callcenter.show', compact('text', 'oneLine', 'details', 'invalidCall') );
    }

    /**
     * Gera o texto e retorna a view de documentação de uma chamada por engano.
     *
     * @param Request $request
     * @return View
     */
    public function invalid(Request $request): View
    {
        $text = $this->getTextLine($request->name_checkbox, $request->name, "Nome: ");
        $text .= $this->getTextLine($request->company_checkbox, $request->company, "Empresa: ");
        $text .= $this->getTextLine($request->tran_checkbox, $request->tran, "Transferência: ");
        $text .= ($request->name_checkbox || $request->company_checkbox || $request->tran_checkbox) ? "<br>" : "";
        $text .= $this->getTextLine(true, $request->reason, "" );
        $text .= ($request->reason ) ? "<br>" : "";
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= $this->getTextLine(true, str_replace("\n", "<br>", $request->details), "" );
        $text .= ($request->details ) ? "<hr>" : "";
        $text .= ($request->phone || $request->date ) ? "<br>" : "";
        $text .= $this->getTextLine(true, ($request->phone_country == "us") ? "+1 " . $request->phone : $request->phone, "Nº: ");
        $text .= $this->getTextLine(true, $request->date, "Data: ");

        $oneLine = $this->getOneLineText($text);

        $details = str_replace("\n", "<br>", $request->details);

        $invalidCall = true;

        return view('callcenter.show', compact('text', 'oneLine', 'details', 'invalidCall') );
    }

    /**
     * Realiza a inserção de uma linha no texto.
     *
     * @param bool $check
     * @param string $value
     * @param string $field
     * @return String
     */
    private function getTextLine($check, $value, $field): String
    {
        if ($check) {
            return "<p>". $this->insertText( $field . $value ) . "</p>\n";
        }
        return "";
    }

    /**
     * Realiza a inserção da linha da requisição.
     *
     * @param bool $value
     * @param string $field
     * @param string $type
     * @return String
     */
    private function getReasonTextLine($value, $field, $type): String
    {
        if ($value) {
            return "<p>". $this->insertText( $field . $value) . "</p>\n";
        }
        return $type;
    }

    /**
     * Realiza as operações necessárias para inserir um texto:
     * - Incluí um ponto final, caso não tenha.
     *
     * @param string $text
     * @return String
     */
    private function insertText(string $text): String
    {
        if (substr($text, -1) != ".") {
            return $text . ".";
        }
        return $text;
    }

    /**
     * Transforma o texto completo em sua versão de uma linha.
     *
     * @param string $text
     * @return String
     */
    private function getOneLineText(string $text): String
    {
        $newText = str_replace("<br>", "", $text);
        $newText = str_replace("\n", "", $newText);
        $newText = str_replace("<hr>", "", $newText);
        $newText = str_replace("<p>", "", $newText);
        $newText = str_replace("</p>", " ", $newText);
        return $newText;
    }

    /**
     * Verifica o tipo de requisição da aplicação.
     *
     * @param string $type
     * @param string $reason
     * @return String
     */
    private function getReason(string $type, string $reason): String
    {
        if ($type == "rds") {
            return $this->getReasonTextLine($reason, "RDS: ", "Requisição de Serviço");
        }
        if ($type == "in") {
            return $this->getReasonTextLine($reason, "IN: ", "Incidente");
        }
        if ($type == "tran") {
            return $this->getReasonTextLine($reason, "Transferência: ", "Transferência de Ligação");
        }
    }
}
