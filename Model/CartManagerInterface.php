<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * (c) Daniel Kucharski <daniel@xerias.be>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\CartBundle\Model;

use Vespolina\CartBundle\Model\CartableItemInterface;
use Vespolina\CartBundle\Model\CartInterface;
use Vespolina\CartBundle\Model\CartItemInterface;

interface CartManagerInterface
{
    /**
     * Create a cart instance
     *
     * @abstract
     * @param string $name Name of the cart
     * @return void
     */
    function createCart($name = 'default');

    /**
     * Create a cart item
     *
     * @abstract
     * @param Vespolina\CartBundle\Model\CartableItemInterface $cartableItem
     * @return CartItemInterface
     */
    function createItem(CartableItemInterface $cartableItem = null);

    /**
     *
     * Calculate prices for a given cart.
     *
     * @abstract
     * @param CartInterface $cart
     * @param bool $determineItemPrices
     * @return void
     */

    function determinePrices(CartInterface $cart, $determineItemPrices = true);
    /**
     * Find an open cart for the given cart owner
     *
     * @abstract
     * @param $owner
     * @param string $cartState
     */
    function findOpenCartByOwner($owner);

    /**
     * Hint the manager that no further manipulations will be performed on the cart anymore
     *
     * @abstract
     * @param CartInterface $cart
     * @return mixed
     */
    function finishCart(CartInterface $cart);

    /**
     * Initialize a new cart.  Eg. setting the initial state
     *
     * @abstract
     * @param CartInterface $cart
     */
    function initCart(CartInterface $cart);

    /**
     * Initialize a new cart item.  Eg. setting the initial item state
     * @abstract
     * @param CartItemInterface $cartItem
     */
    function initCartItem(CartItemInterface $cartItem);

    /**
     * Manually set the state of the cart
     *
     * @param CartInterface $cart
     * @param $state
     */
    function setCartState(CartInterface $cart, $state);

    /**
     * Save or update the supplied cart
     *
     * @abstract
     * @param \Vespolina\CartBundle\Model\CartInterface $cart
     * @param $andFlush
     * @return void
     */
    function updateCart(CartInterface $cart, $andFlush = true);

}