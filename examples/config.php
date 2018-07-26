<?php
// customer email
const CLIENT_EMAIL = 'sandboxapitest@g2a.com';
// this is sandbox environment for testing, for production domain, see your G2A Dashboard
const API_DOMAIN = 'sandboxapi.g2a.com';
// customer API hash, you can find it on G2A Dashboard
const API_HASH = 'qdaiciDiyMaTjxMt';
// customer API secret, you can find it on G2A Dashboard
const API_SECRET = 'b0d293f6-e1d2-4629-8264-fd63b5af3207b0d293f6-e1d2-4629-8264-fd63b5af3207';

$config = new \G2A\IntegrationApi\Model\Config(CLIENT_EMAIL, API_DOMAIN, API_HASH, API_SECRET);
