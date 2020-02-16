<form action="/src/document.php" method="POST" id="cc-normal-call-form">
    <section class="bg-white border rounded shadow-sm my-3 p-3">
        <h4 class="mb-3">Chamada</h4>
        <div class="form-row my-2">
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-normal-call-name-checkbox">Nome</label>
                            <input class="cc-input-checkbox" id="cc-normal-call-name-checkbox" name="name-checkbox" type="checkbox" checked>
                        </div>
                    </div>
                    <select class="custom-select cc-input-select col-2" name="gender">
                        <option value="sr">Sr.</option>
                        <option value="sra">Sra.</option>
                    </select>
                    <input class="form-control cc-input-text" type="text" name="name" placeholder="Nome do Cliente">
                </div>
            </div>
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-normal-call-company-checkbox">Empresa</label>
                            <input class="cc-input-checkbox" id="cc-normal-call-company-checkbox" name="company-checkbox" type="checkbox">
                        </div>
                    </div>
                    <input class="form-control cc-input-text" type="text" name="company" placeholder="Nome da Empresa" readonly>
                </div>
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-id-checkbox">Cadastro</label>
                            <input class="cc-input-checkbox" id="cc-id-checkbox" name="id-checkbox" type="checkbox" checked>
                        </div>
                    </div>
                    <select class="custom-select cc-input-select col-2" name="id-type">
                        <option value="id">ID</option>
                        <option value="cnpj">CNPJ</option>
                        <option value="cpf">CPF</option>
                        <option value="email">E-Mail</option>
                        <option value="host">Domínio</option>
                    </select>
                    <input class="form-control cc-input-text" type="text" name="id" placeholder="Nome">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-event-checkbox">Evento</label>
                            <input class="cc-input-checkbox" id="cc-event-checkbox" name="event-checkbox" type="checkbox">
                        </div>
                    </div>
                    <input class="form-control cc-input-text" type="text" name="event" placeholder="Nº do Evento" readonly>
                </div>
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-normal-call-phone-checkbox">Telefone</label>
                            <input class="cc-input-checkbox" id="cc-normal-call-phone-checkbox" name="phone-checkbox" type="checkbox">
                        </div>
                    </div>
                    <input class="form-control cc-input-text" type="text" name="phone" placeholder="Telefone" readonly>
                </div>
            </div>
            <div class="col">
                <div class="input-group cc-input-check">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-normal-call-date-checkbox">Data</label>
                            <input class="cc-input-checkbox" id="cc-normal-call-date-checkbox" name="date-checkbox" type="checkbox">
                        </div>
                    </div>
                    <input class="form-control cc-input-date" type="text" name="date" placeholder="Data e Hora" readonly>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white border rounded shadow-sm my-3 p-3">
        <h4 class="mb-3">Tratativa</h4>
        <div class="form-row my-2">
            <div class="col">
                <div class="input-group cc-normal-call-request">
                    <div class="input-group-prepend">
                        <div class="input-group-text cc-bg-light">
                            <label class="m-0 mr-2" for="cc-id-checkbox">Solicitação</label>
                        </div>
                    </div>
                    <select class="custom-select cc-request-type col-2" name="request-type">
                        <option value="rds">RDS</option>
                        <option value="in">IN</option>
                        <option value="tran">Transferência</option>
                    </select>
                    <input class="form-control cc-request-value" type="text" name="request" placeholder="Requisição">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="cc-bg-light border-top border-left border-right cc-border-light rounded-top p-2 col-12 text-center mb-0" for="cc-normal-call-details">Detalhes</label>
            <textarea class="form-control cc-textarea-min-height cc-textarea-round" id="cc-normal-call-details" placeholder="Detalhes da tratativa"></textarea>
        </div>
    </section>


    <section class="my-3 shadow-sm">
        <button class="btn cc-btn-primary col-12" type="submit">Documentar Chamada</button>
    </section>

</form>