<?php
namespace G2A\IntegrationApi\Model;

/**
 * Interface ProductInterface.
 */
interface ProductInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug($slug);

    /**
     * @return int
     */
    public function getQty();

    /**
     * @param int $qty
     *
     * @return $this
     */
    public function setQty($qty);

    /**
     * @return float
     */
    public function getMinPrice();

    /**
     * @param float $minPrice
     *
     * @return $this
     */
    public function setMinPrice($minPrice);

    /**
     * @return string
     */
    public function getThumbnail();

    /**
     * @param string $thumbnail
     *
     * @return $this
     */
    public function setThumbnail($thumbnail);

    /**
     * @return string
     */
    public function getSmallImage();

    /**
     * @param string $smallImage
     *
     * @return $this
     */
    public function setSmallImage($smallImage);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getRegion();

    /**
     * @param string $region
     *
     * @return $this
     */
    public function setRegion($region);

    /**
     * @return string
     */
    public function getDeveloper();

    /**
     * @param string $developer
     *
     * @return $this
     */
    public function setDeveloper($developer);

    /**
     * @return string
     */
    public function getPublisher();

    /**
     * @param string $publisher
     *
     * @return $this
     */
    public function setPublisher($publisher);

    /**
     * @return string
     */
    public function getPlatform();

    /**
     * @param string $platform
     *
     * @return $this
     */
    public function setPlatform($platform);

    /**
     * @return array
     */
    public function getRestrictions();

    /**
     * @param array $restrictions
     *
     * @return $this
     */
    public function setRestrictions($restrictions);

    /**
     * @return array
     */
    public function getRequirements();

    /**
     * @param array $requirements
     *
     * @return $this
     */
    public function setRequirements($requirements);

    /**
     * @return array
     */
    public function getVideos();

    /**
     * @param array $videos
     *
     * @return $this
     */
    public function setVideos($videos);

    /**
     * @return array
     */
    public function getCategories();

    /**
     * @param array $categories
     *
     * @return $this
     */
    public function setCategories($categories);
}
