<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Media gallery block
 *
 * @package    block_mediagallery
 * @copyright  2014 NetSpot Pty Ltd
 * @author     Adam Olley <adam.olley@netspot.com.au>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->dirroot.'/blocks/mediagallery/locallib.php');

class block_mediagallery extends block_base {
    /**
     * Block initialization
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_mediagallery');
    }

    /**
     * Return contents of mediagallery block
     *
     * @return stdClass contents of block
     */
    public function get_content() {
        global $CFG, $DB, $OUTPUT;

        if($this->content !== NULL) {
            return $this->content;
        }

        $config = get_config('block_mediagallery');

        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';


        $renderer = $this->page->get_renderer('block_mediagallery');
        $this->content->text = $renderer->basic_search_form();

        return $this->content;
    }

    /**
     * Allow the block to have a configuration page
     *
     * @return boolean
     */
    public function has_config() {
        return false;
    }

    /**
     * Locations where block can be displayed
     *
     * @return array
     */
    public function applicable_formats() {
        return array('my-index' => false, 'course-view' => true);
    }

}
