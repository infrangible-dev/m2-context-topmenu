<?php

declare(strict_types=1);

namespace Infrangible\ContextTopmenu\Plugin\Theme\Block\Html;

use Magento\Framework\App\Http\Context;

/**
 * @author      Andreas Knollmann
 * @copyright   2014-2024 Softwareentwicklung Andreas Knollmann
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 */
class Topmenu
{
    /** @var Context */
    protected $httpContext;

    /**
     * @param Context $httpContext
     */
    public function __construct(Context $httpContext)
    {
        $this->httpContext = $httpContext;
    }

    /** @noinspection PhpUnusedParameterInspection */
    public function afterGetCacheKeyInfo(\Magento\Theme\Block\Html\Topmenu $subject, array $result): array
    {
        $varyString = $this->httpContext->getVaryString();

        if ($varyString !== null) {
            $result[] = sprintf('VARY_%s', $varyString);
        }

        return $result;
    }
}
