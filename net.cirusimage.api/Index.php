<?php
/**
 * Index file
 *
 * cirrusImage :: Index and Page
 *
 * PHP 5
 *
 * LICENSE:
 *
 * Copyright (c) 2010, Forest Feighner
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *  - Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *  - Neither the name of the cirrusImage nor the names of its contributors may
 *    be used to endorse or promote products derived from this software without
 *    specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
 * OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. *
 *
 * @package   cirrusImage
 * @author    Forest Feighner <forest@cirrusimage.net>
 * @copyright 2010 Forest Feighner
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version   svn revision: $Id:$
 * @version   svn revision: $Date:$
 * @version   svn revision: $Rev:$
 * @link      http://cirrusImage.net
 * @link      http://api.cirrusImage.net
 * @since     0.1
 * @filesource
 * @todo      general clean up and recoding
 */

/**
 * Index that wraps a context array.
 * All five public methods are needed to implement
 * the Iterator interface.
 * @package cirrusImage
 * @link    http://giorgiosironi.blogspot.com/2010/02/practical-php-patterns-iterator.html Iterator Pattern
 */
class Index implements Iterator
{
    private $_content;
    private $_page = 0;
    public  $context = null;

    public function __construct(array $content, array $hit)
    {
        $this->_content = $content;
        return $this->context = $hit;
    }

    public function rewind()
    {
        return $this->_page = $this->_content[$this->_page];
    }

    public function valid()
    {
        return isset($this->_content[$this->_page]);
    }

    public function current()
    {
        return $this->context;
    }

    public function key()
    {
        return $this->_page;
    }

    public function next()
    {
        return array_shift($this->_content);
    }
}

/**
 * Usually IteratorAggregate is the interface to implement.
 * It has only one method, which must return an Iterator
 * already defined as another class (e.g. ArrayIterator)
 * Iterator gives a finer control over the algorithm,
 * because all the hook points of Iterator' contract
 * are available for implementation.
 * @package cirrusImage
 */
class Page implements IteratorAggregate
{
    private $_content;

    public function __construct(array $content)
    {
        $this->_content = $content;
    }

    /**
     * Matches content pages with request
     * @return Arrary with string value of 'context'
     */
    public function contains($page)
    {
        return array_intersect($this->_content, $page);
    }

    /**
     * Only this method is necessary to implement IteratorAggregate.
     * @return Iterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_content);
    }
}