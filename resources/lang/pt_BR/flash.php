<?php

return [

    // Models
    'updated'                  => '[m] atualizado com sucesso!                                         |[f] atualizada com sucesso!',
    'updated_plural'           => '[m] atualizados com sucesso!                                        |[f] atualizadas com sucesso!',

    'confirmed'                => '[m] confirmado com sucesso!                                         |[f] confirmada com sucesso!',
    'rejected'                 => '[m] rejeitado com sucesso!                                          |[f] rejeitada com sucesso!',

    'saved'                    => '[m] salvo com sucesso!                                             |[f] salva com sucesso!',
    'saved_plural'             => '[m] salvos com sucesso!                                            |[f] salvas com sucesso!',

    'created'                    => '[m] criado com sucesso!                                             |[f] criada com sucesso!',
    'created_plural'             => '[m] criados com sucesso!                                            |[f] criadas com sucesso!',

    'deleted'                  => '[m] deletado com sucesso!                                           |[f] deletada com sucesso!',
    'not_deleted'              => '[m] não pode ser deletado pois há outros registros atrelados a ele. |[f] não pode ser deletada pois há outros registros atrelados a ela.',

    'approved'                 => '[m] aprovado com sucesso!                                           |[f] aprovada com sucesso!',

    'added'                    => '[m] adicionado com sucesso!                                         |[f] adicionada com sucesso!',
    'added_plural'             => '[m] adicionados com sucesso!                                        |[f] adicionadas com sucesso!',

    'removed'                  => '[m] removido com sucesso!                                           |[f] removida com sucesso!',
    'removed_plural'           => '[m] removidos com sucesso!                                          |[f] removidas com sucesso!',

    'not_found'                => '[m] não encontrado!                                                 |[f] não encontrada!',
    'not_found_plural'         => '[m] não encontrados!                                                |[f] não encontradas!',

    'already_confirmed'        => '[m] já confirmado!                                                  |[f] já confirmada!',
    'already_rejected'         => '[m] já rejeitado!                                                   |[f] já rejeitada!',

    'already_registered'       => '[m] já cadastrado!                                                  |[f] já cadastrada!',

    'completed'                => '[m] completado com sucesso!                                         |[f] completada com sucesso!',
    'inactivated'              => '[m] inativado com sucesso!                                          |[f] inativada com sucesso!',
    'activated'                => '[m] ativado com sucesso!                                            |[f] ativada com sucesso!',
    'imported'                 => '[m] importados com sucesso!                                         |[f] importadas com sucesso!',
    'purchased'                => '[m] adquirido com sucesso!                                          |[f] adquirida com sucesso!',
    'renewed'                  => '[m] renovado com sucesso!                                           |[f] renovada com sucesso!',

    'withdrawn'                  => '[m] retirado com sucesso!                                           |[f] retirada com sucesso!',
    'not_withdrawn'              => '[m] não foi retirado!                                               |[f] não foi retirada!',
    'anticipated'                => '[m] antecipado com sucesso!                                         |[f] antecipada com sucesso!',

    'duplicated'                  => '[m] duplicado com sucesso!                                         |[f] duplicada com sucesso!',
    'duplicated_plural'           => '[m] duplicados com sucesso!                                        |[f] duplicadas com sucesso!',

    // Errors
    'error'                     => 'Ocorreu um erro ao',
    'error_in_the_process'      => 'Ocorreu um erro durante o processo!',

    '401'                       => 'Você não tem permissão para acessar a página requisitada!',
    '403'                       => 'Você não tem permissão para acessar a página requisitada!',
    '404'                       => 'A página requisitada não existe!',
    '419'                       => 'Muito tempo se passou, a página expirou!',
    'invalid_role'              => 'O perfil selecionado não é válido!',
    'invalid_login'             => 'Você não tem permissão para acessar o sistema!',
    'self_delete'               => 'Você não pode deletar o seu próprio usuário!',
    'inactive_user'             => 'O usuário não está ativo! Entre em contato com a Spoten para reativar sua conta.',
    'no_active_companies'       => 'Não há empresas ativas no momento! Agradecemos seu interesse em participar da nossa plataforma, aguarde nosso contato.',
    'inactive_company'          => 'Empresa inativa no momento! Agradecemos seu interesse em participar da nossa plataforma, aguarde nosso contato.',

    'zipcode_not_found'         => 'O CEP informado não foi encontrado!',
    'leaflet_marker'            => 'O marcador do mapa não pôde ser atualizado!',
    'leaflet_address'           => 'Os campos de endereço não puderam ser atualizados!',

    'upload_success'            => 'Upload realizado com sucesso! O arquivo está em processamento...',
    'upload_invalid_csv'        => 'Arquivo inválido! Faça o upload de um <b>arquivo.csv</b>.',

    'email_required'          => 'O e-mail não foi informado!',
    'document_required'       => 'O documento não foi informado!',
    'phone_required'          => 'O telefone não foi informado!',

    'email_registered'          => 'O e-mail informado já está cadastrado!',
    'document_registered'       => 'O documento informado já está cadastrado!',
    'phone_registered'          => 'O telefone informado já está cadastrado!',
    'password_not_match'        => 'As senhas não coincidem!',
    'push_error'                => 'Ocorreu um erro ao enviar a notificação por push',
    'balance_fail'              => 'Você não possui saldo suficiente para realizar o processo!',
    'accepted_membership_terms' => 'Para utilizar esse recurso você deve aceitar os Termos de Adesão!',
    'is_not_cell_phone'               => 'O número de telefone não é um celular!',
    'installments_less_than_twelve' => 'A quantidade de parcelas deve estar entre 1 e 12!',
    'company_not_approve_by_sub_account' => 'Não é possível aprovar essa empresa pois as subconta não foi criada!',
    
    'authentication_code_not_informed' => 'O código de autenticação não foi informado!',
    'authentication_code_not_found' => 'O código de autenticação não foi encontrado!',

    'max_post_size' => 'Erro, tamanho dos arquivos/imagens excede o tamanho de: ',
    
    'not_gift_for_himself' => 'Você não pode presentear para você mesmo!',

    'register_completed' => 'Para continuar, complete seu cadatro!',

    'not_document' => 'Preencha por favor com um CPF',
    'not_zipcode' => 'Preencha por favor com um CEP',
    'not_address' => 'Preencha por favor com um Endereço',
    'not_number' => 'Preencha por favor com um Número do Endereço',
    'not_neighborhood' => 'Preencha por favor com um Bairro',

    'duplicated_successfully'   => 'Duplicado com sucesso!',
    'updated_successfully'      => 'Atualizado com sucesso!',
    'deleted_successfully'      => '[m] Deletado com sucesso!!                                        |[f] Deletada com sucesso!!',
];
