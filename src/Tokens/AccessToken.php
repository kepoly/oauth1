<?php

namespace OAuth1\Tokens;

use OAuth1\Contracts\Tokens\AccessTokenInterface;
use Psr\Http\Message\ResponseInterface;

class AccessToken extends Token implements AccessTokenInterface
{
    /**
     * Create from HTTP response.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \OAuth1\Contracts\Tokens\AccessTokenInterface
     */
    public static function fromHttpResponse(ResponseInterface $response)
    {
        parse_str($response->getBody()->getContents(), $contents);

        return new static($contents['oauth_token'], $contents['oauth_token_secret']);
    }
}
