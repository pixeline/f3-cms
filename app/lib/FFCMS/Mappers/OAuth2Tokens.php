<?php

namespace FFCMS\Mappers;

/**
 * OAuth2 App Tokens Mapper Class.
 *
 * @author Vijay Mahrra <vijay@yoyo.org>
 * @copyright (c) Copyright 2016 Vijay Mahrra
 * @license GPLv3 (http://www.gnu.org/licenses/gpl-3.0.html)
 *
 * @property int    $id
 * @property string $uuid
 * @property string $created
 * @property string $expires
 * @property string $users_uuid
 * @property string $client_id
 * @property string $token
 * @property string $type
 * @property string $description
 * @property string $scope
 */
class OAuth2Tokens extends Mapper
{
    /**
     * This one is guessed wrong!
     * @var type
     */
    protected $table = 'oauth2_tokens';

    /**
     * types of token
     *
     * @var type
     */
    public $types = [
        'code',
        'access_token',
        'refresh_token',
    ];

    /**
     * Fields and their visibility to clients, boolean or string of visible field name
     *
     * @var array $fieldsVisible
     */
    public $fieldsVisible = [
        'uuid'        => 'id',
        'users_uuid'  => 'user_id',
    ];

    /**
     * Filter rules for fields
     *
     * @var array $filterRules
     * @link https://github.com/Wixel/GUMP
     */
    public $filterRules = [
        'uuid'        => 'trim|sanitize_string|lower',
        'created'     => 'trim|sanitize_string',
        'expires'     => 'trim|sanitize_string',
        'users_uuid'  => 'trim|sanitize_string|lower',
        'client_id'   => 'trim|sanitize_string|lower',
        'token'       => 'trim|sanitize_string',
        'type'        => 'trim|sanitize_string',
        'description' => 'trim|sanitize_string',
        'scope'       => 'trim|sanitize_string',
    ];

    /**
     * Validation rules for fields
     *
     * @var array $validationRules
     * @link https://github.com/Wixel/GUMP
     */
    public $validationRules = [
        'uuid'        => 'alpha_dash',
        'users_uuid'  => 'alpha_dash',
        'client_id'   => 'alpha_dash',
        'type'        => 'min_len,4',
    ];
}
