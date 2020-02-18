<form action="{{ route("invalid-call") }}" method="post" id="cc-invalid-call-form">
    @csrf
    <section class="bg-white border rounded shadow-sm my-3 p-3">
        <h4 class="mb-3">Chamada</h4>
        <div class="form-row my-2">
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-invalid-call-name-checkbox">Nome</label>
                            <input class="cc-input-checkbox" id="cc-invalid-call-name-checkbox" name="name_checkbox" type="checkbox">
                        </div>
                    </div>
                    <select class="custom-select cc-input-select col-2" name="gender" disabled>
                        <option value="sr">Sr.</option>
                        <option value="sra">Sra.</option>
                    </select>
                    <input class="form-control cc-input-text" type="text" name="name" placeholder="Nome do Cliente" readonly>
                </div>
            </div>
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-invalid-call-company-checkbox">Empresa</label>
                            <input class="cc-input-checkbox" id="cc-invalid-call-company-checkbox" name="company_checkbox" type="checkbox">
                        </div>
                    </div>
                    <input class="form-control cc-input-text" type="text" name="company" placeholder="Nome da Empresa" readonly>
                </div>
            </div>
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-invalid-call-tran-checkbox">Transferência</label>
                            <input class="cc-input-checkbox" id="cc-invalid-call-tran-checkbox" name="tran_checkbox" type="checkbox">
                        </div>
                    </div>
                    <input class="form-control cc-input-text" type="text" name="tran" placeholder="Funcionário ou Setor" readonly>
                </div>
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2">Telefone</label>
                            <input class="cc-input-checkbox" id="cc-invalid-call-phone-checkbox" name="phone_checkbox" type="checkbox" checked>
                        </div>
                    </div>
                    <input class="form-control cc-input-text" type="text" name="phone" placeholder="Telefone" required>
                </div>
            </div>
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2">Data</label>
                            <input class="cc-input-checkbox" id="cc-invalid-call-date-checkbox" name="date_checkbox" type="checkbox" checked>
                        </div>
                    </div>
                    <input class="form-control cc-input-date" type="text" name="date" placeholder="Data e Hora" required>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white border rounded shadow-sm my-3 p-3">
        <h4 class="mb-3">Tratativa</h4>
        <div class="form-row my-2">
            <div class="col">
                <div class="input-group cc-invalid-call-request">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-type-invalid-call-checkbox">Chamada por Engano</label>
                        </div>
                    </div>
                    <select class="custom-select cc-invalid-call-request-type col-3" id="cc-type-invalid-call-checkbox" name="invalid-call-type">
                        <option selected disabled>Escolha o Tipo</option>
                        <option value="ended">Encerrada</option>
                        <option value="mistake">Engano</option>
                        <option value="muted">Sem Comunicação</option>
                        <option value="contact">Tentativa de Contato</option>
                        <option value="offer">Oferecer Serviços</option>
                        <option value="telemarketing">Telemarketing</option>
                        <option value="other">Outros Casos</option>
                    </select>
                    <input class="form-control cc-invalid-call-request-value" type="text" name="reason" placeholder="Requisição">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="cc-bg-light border-top border-left border-right cc-border-light rounded-top p-2 col-12 text-center mb-0" for="cc-details-invalid-call">Detalhes</label>
            <textarea class="form-control cc-textarea-min-height cc-textarea-round" name="details" id="cc-invalid-call-details" placeholder="Detalhes da tratativa"></textarea>
        </div>
        <button class="btn cc-btn-outline-primary col-8 offset-2" onclick="textReload('.cc-invalid-call-request')" type="button">Recarregar Texto</button>
    </section>


    <section class="my-3 shadow-sm">
        <button class="btn cc-btn-primary col-12" type="submit">Documentar Chamada</button>
    </section>
</form>