<?php

namespace Fasil\Assignment5\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;
use Fasil\Assignment5\Block\Adminhtml\Form\Field\GenderType;

class Plans extends AbstractFieldArray
{
    /**
     * @var Gender
     */
    private $Gender;

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn('interest_rate', ['label' => __('Interest Rate'), 'class' => 'required-entry']);
        $this->addColumn('tenure', ['label' => __('Tenure (Months)'), 'class' => 'required-entry']);
        $this->addColumn('gender', [
            'label' => __('Gender'),
            'renderer' => $this->getGender(),
            'class' => 'required-entry'
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];
        $type = $row->getType();
        if($type !== null){
            $options['option_' . $this->getGender()->calcOptionHash($type)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }

    /**
     * @return GenderType
     * @throws LocalizedException
     */
    private function getGender()
    {
        if (!$this->Gender) {
            $this->Gender = $this->getLayout()->createBlock(
                GenderType::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->Gender;
    }
}
