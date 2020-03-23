<?php declare(strict_types=1);

namespace App\Domain\Market\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;


/**
 * Util to parse market API
 * for now without strategies, directly one source: Albion Data Project
 */
class MarketParser
{
    const PRICE_BASE_URL = 'https://www.albion-online-data.com/api/v2/stats/prices/';

    protected Client $client;
    protected MarketPrices $marketPrices;

    /**
     * DI
     * @param Client $client
     * @param MarketPrices $marketPrices
     */
    public function __construct(Client $client, MarketPrices $marketPrices)
    {
        $this->client = $client;
        $this->marketPrices = $marketPrices;
    }

    /**
     * Do grab and parse
     * @param callable $externalLogger
     */
    public function parse(callable $externalLogger): void
    {
        $resources = $this->getResourcesToBeParsed();

        $externalLogger(['init_progress_bar', count($resources)]);

        $makeRequests = function ($resources) {
            foreach ($resources as $key => $uri) {
                yield $key => new Request('GET', $uri);
            }
        };

        $pool = new Pool($this->client, $makeRequests($resources), [
            'concurrency' => 5,
            'fulfilled' => function (Response $response, $key) use ($externalLogger) {
                $externalLogger(['log', "\nGot date for ${key} successfully √"]);

                $contentStr = $response->getBody()->getContents();
                $content = json_decode($contentStr);

                /*
                  {
                    item_id: "T5_HEAD_PLATE_SET1",
                    city: "3332",
                    quality: 1,
                    sell_price_min: 5000,
                    sell_price_min_date: "2020-03-19T01:22:00",
                    sell_price_max: 5000,
                    sell_price_max_date: "2020-03-19T01:22:00",
                    buy_price_min: 0,
                    buy_price_min_date: "0001-01-01T00:00:00",
                    buy_price_max: 0,
                    buy_price_max_date: "0001-01-01T00:00:00"
                },

                 */

                //TODO save in DB: loop on $content
                $this->marketPrices; //put portion ->createFromRaw($piece);

                $externalLogger(['step_progress_bar']);
            },
            'rejected' => function (RequestException $reason, $key) use ($externalLogger) {
                $externalLogger(['error', "\nFailure for ${key}!\n{$reason->getMessage()}"]);

                $externalLogger(['step_progress_bar']);
            },
        ]);

        $promise = $pool->promise();
        $promise->wait();

        $externalLogger(['finish_progress_bar']);
    }

    /**
     * Get list of urls
     * @return array
     */
    protected function getResourcesToBeParsed()
    {
        //TODO fetch them from DB
        $itemNames = [
            'T4_HEAD_PLATE_SET1',
            'T5_HEAD_PLATE_SET1',
        ];

        return array_reduce($itemNames, function ($batch, $name) {
            $batch[$name] = self::PRICE_BASE_URL . $name;
            return $batch;
        }, []);
    }
}
