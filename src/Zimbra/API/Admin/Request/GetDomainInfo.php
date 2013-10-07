<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Admin\Request;

use Zimbra\Soap\Request;
use Zimbra\Soap\Struct\DomainSelector as Domain;

/**
 * GetDomainInfo class
 * Get Domain information.
 *
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class GetDomainInfo extends Request
{
    /**
     * Apply config flag
     * @var bool
     */
    private $_applyConfig;

    /**
     * Domain
     * @var Domain
     */
    private $_domain;

    /**
     * Constructor method for GetDomainInfo
     * @param  Domain $account
     * @param  bool $applyConfig
     * @return self
     */
    public function __construct(Domain $domain = null, $applyConfig = null)
    {
        parent::__construct();
        if($domain instanceof Domain)
        {
            $this->_domain = $domain;
        }
        if(null !== $applyConfig)
        {
            $this->_applyConfig = (bool) $applyConfig;
        }
    }

    /**
     * Gets or sets domain
     *
     * @param  Domain $domain
     * @return Domain|self
     */
    public function domain(Domain $domain = null)
    {
        if(null === $domain)
        {
            return $this->_domain;
        }
        $this->_domain = $domain;
        return $this;
    }

    /**
     * Gets or sets applyConfig
     *
     * @param  bool $applyConfig
     * @return bool|self
     */
    public function applyConfig($applyConfig = null)
    {
        if(null === $applyConfig)
        {
            return $this->_applyConfig;
        }
        $this->_applyConfig = (bool) $applyConfig;
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray()
    {
        if(is_bool($this->_applyConfig))
        {
            $this->array['applyConfig'] = $this->_applyConfig ? 1 : 0;
        }
        if($this->_domain instanceof Domain)
        {
            $this->array += $this->_domain->toArray();
        }
        return parent::toArray();
    }

    /**
     * Method returning the xml representation of this class
     *
     * @return SimpleXML
     */
    public function toXml()
    {
        if($this->_domain instanceof Domain)
        {
            $this->xml->append($this->_domain->toXml());
        }
        if(is_bool($this->_applyConfig))
        {
            $this->xml->addAttribute('applyConfig', $this->_applyConfig ? 1 : 0);
        }
        return parent::toXml();
    }
}
