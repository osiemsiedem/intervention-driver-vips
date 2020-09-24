<?php

declare(strict_types=1);

namespace Intervention\Image\Vips\Shapes;

use Intervention\Image\Image;

class EllipseShape extends AbstractShape
{
    /**
     * @var int
     */
    public $width = 100;

    /**
     * @var int
     */
    public $height = 100;

    /**
     * Create a new shape instance.
     *
     * @param  int|null  $width
     * @param  int|null  $height
     * @return void
     */
    public function __construct($width = null, $height = null)
    {
        $this->width = is_numeric($width) ? (int) $width : $this->width;
        $this->height = is_numeric($height) ? (int) $height : $this->height;
    }

    /**
     * Draw the shape.
     *
     * @param \Intervention\Image\Image $image
     * @param int                       $x
     * @param int                       $y
     * @return void
     */
    public function applyToImage(Image $image, $x = 0, $y = 0)
    {
        $this->applyToImageViaSVG(
            $image,
            'ellipse',
            [
                'cx' => $x,
                'cy' => $y,
                'rx' => $this->width / 2,
                'ry' => $this->height / 2,
            ] + $this->getSVGAttributes()
        );
    }
}
