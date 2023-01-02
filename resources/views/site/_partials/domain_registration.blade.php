<section id="registro-de-dominios" class="bg-white py-20 m-h-screen">
    <div class="c-container">
            <div class="w-content justify-content-start text-center mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('Registro de Domínio') }}</h2>
                  <p class="card__text__domain_registration mb-3">
                    <span class="text-gray-400 leading-relaxed">
                            Um domínio nada mais é que o endereço do site, ele funciona como a forma de acesso inicial de seu usuário.
                            <br/>
                            A partir do domínio é que os servidores em que seu site se encontra podem liberar o acesso.
                            <br/>
                            O registro de domínio surge para organizar uma relação entre nomes e endereços IP (Internet Protocol – Protocolo de Internet).
                            <br/>
                            Quando um usuário digita um endereço, seu navegador busca o servidor DNS (Domain Name System – Sistema de Nomes de Domínios).
                            <br/>
                            Os servidores DNS são os responsáveis por traduzir para IP, em números, o domínio digitado.
                        </span>

                    </p>
            </div>

        <div class="flex flex-wrap py-10">
            <div class="flex-initial w-full p-4">
                <div class="card">
                    <div class="card__icon">
                        <span class="bg-indigo-100 rounded-full flex items-center justify-center w-14 h-14 p-4 text-indigo-500">
                            <svg class="w-full" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="card__content">
                        <h2 class="card__title">{{ __('Compre já o seu Domínio, conosco!') }}</h2>
                        <p class="card__text">
                            Agora que você já sabe a funcionalidade básica de um domínio, chegou a hora de fazer a sua escolha. Afinal, antes do registro de domínio, é importante que seu projeto web tenha o nome ideal!
                            <br/>

                          </p>


                        <form class="form mt-10" action="">
                            <div class="form__row">
                                <div class="form__input-group">
                                    <div class="form__label-group">
                                        <p>
                                            <label for="name" class="">Pesquisar Domínio <abbr title="Obrigatório">*</abbr></label>
                                        </p>
                                    </div>


                                    <div class="input-group">
                                        <input type="text" class="form__input__domain_registration" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i> &nbsp; Pesquisar</button>
                                      </div>


                                </div>
                                <small id="note_important" class="form-text text-muted">
                                    <abbr title="Nota">*Nota.:</abbr> Primeiro consulte para ver se ele está disponível para compra.

                                </small>

                            </div>

                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
