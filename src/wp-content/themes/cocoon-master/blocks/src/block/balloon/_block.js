/**
 * Cocoon Blocks
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

import {THEME_NAME, BLOCK_CLASS, getBalloonClasses, isSameBalloon} from '../../helpers';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import classnames from 'classnames';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InnerBlocks, RichText, MediaUpload, InspectorControls } = wp.editor;
const { Button, PanelBody, SelectControl, BaseControl } = wp.components;
const { Fragment } = wp.element;
const DEFAULT_NAME = __( '未入力', THEME_NAME );

registerBlockType( 'cocoon-blocks/balloon-ex-box-1', {

  title: __( '吹き出し', THEME_NAME ),
  icon: <FontAwesomeIcon icon={['far', 'comment']} />,
  category: THEME_NAME + '-block',
  description: __( '登録されている吹き出しのオプションを変更できます。', THEME_NAME ),
  keywords: [ 'balloon', 'box' ],

  attributes: {
    name: {
      type: 'string',
      default: '',
    },
    index: {
      type: 'string',
      default: '0',
    },
    id: {
      type: 'string',
      default: '',
    },
    icon: {
      type: 'string',
      default: '',
    },
    style: {
      type: 'string',
      default: 'stn',
    },
    position: {
      type: 'string',
      default: 'l',
    },
    iconstyle: {
      type: 'string',
      default: 'cb',
    },
    iconid: {
      type: 'number',
      default: 0,
    },
  },

  edit( { attributes, setAttributes } ) {
    var { name, index, id, icon, style, position, iconstyle, iconid } = attributes;
    //新規作成時
    if (!icon && index == '0' && gbSpeechBalloons[0]) {
        id = gbSpeechBalloons[0].id;
        icon = gbSpeechBalloons[0].icon;
        style = gbSpeechBalloons[0].style;
        position = gbSpeechBalloons[0].position;
        iconstyle = gbSpeechBalloons[0].iconstyle;
        if (!name) {
          name = gbSpeechBalloons[0].name;
        }
        setAttributes( { name: name, index: index, id: id, icon: icon, style: style, position: position, iconstyle: iconstyle } );
    }
    //新規作成以外
    if (gbSpeechBalloons[index]) {
      if (isSameBalloon(index, id, icon, style, position, iconstyle)) {

        id = gbSpeechBalloons[index].id;
        icon = gbSpeechBalloons[index].icon;
        style = gbSpeechBalloons[index].style;
        position = gbSpeechBalloons[index].position;
        iconstyle = gbSpeechBalloons[index].iconstyle;
        if (!name) {
          name = gbSpeechBalloons[index].name;
        }
        setAttributes( { index: index, id: id, icon: icon, style: style, position: position, iconstyle: iconstyle } );
      }
    }

    const renderIcon = ( obj ) => {
      // console.log(icon);
      // console.log(gbSpeechBalloons[index].icon);
      // console.log((icon === gbSpeechBalloons[index].icon) ? icon : gbSpeechBalloons[index].icon);
      return (
        <Button className="image-button" onClick={ obj.open } style={ { padding: 0 } }>
          <img src={ icon ? icon : gbSpeechBalloons[index].icon } alt={icon ? '' : gbSpeechBalloons[index].name} className={ `speech-icon-image wp-image-${ iconid }` } />
        </Button>
      );
    };

    //console.log(gbSpeechBalloons);
    var balloons = [];
    gbSpeechBalloons.map((balloon, index) => {
      //console.log(balloon);
      if (gbSpeechBalloons[index].visible == '1') {
        balloons.push({
          value: index,
          label: balloon.title,
        });
      }
    });
    //console.log(balloons);

    return (
      <Fragment>
        <InspectorControls>
          <PanelBody title={ __( 'スタイル設定', THEME_NAME ) }>

            <SelectControl
              label={ __( '人物', THEME_NAME ) }
              value={ index }
              onChange={ ( value ) => setAttributes( {
                index: value,
                name: gbSpeechBalloons[value].name,
                id: gbSpeechBalloons[value].id,
                icon: gbSpeechBalloons[value].icon,
                style: gbSpeechBalloons[value].style,
                position: gbSpeechBalloons[value].position,
                iconstyle: gbSpeechBalloons[value].iconstyle } ) }
              options={ balloons }
            />

            <SelectControl
              label={ __( '吹き出しスタイル', THEME_NAME ) }
              value={ style }
              onChange={ ( value ) => setAttributes( { style: value } ) }
              options={ [
                {
                  value: 'stn',
                  label: __( 'デフォルト', THEME_NAME ),
                },
                {
                  value: 'flat',
                  label: __( 'フラット', THEME_NAME ),
                },
                {
                  value: 'line',
                  label: __( 'LINE風', THEME_NAME ),
                },
                {
                  value: 'think',
                  label: __( '考え事', THEME_NAME ),
                },
              ] }
            />

            <SelectControl
              label={ __( '人物位置', THEME_NAME ) }
              value={ position }
              onChange={ ( value ) => setAttributes( { position: value } ) }
              options={ [
                {
                  value: 'l',
                  label: __( '左', THEME_NAME ),
                },
                {
                  value: 'r',
                  label: __( '右', THEME_NAME ),
                },
              ] }
            />

            <SelectControl
              label={ __( 'アイコンスタイル', THEME_NAME ) }
              value={ iconstyle }
              onChange={ ( value ) => setAttributes( { iconstyle: value } ) }
              options={ [
                {
                  value: 'sn',
                  label: __( '四角（枠線なし）', THEME_NAME ),
                },
                {
                  value: 'sb',
                  label: __( '四角（枠線あり）', THEME_NAME ),
                },
                {
                  value: 'cn',
                  label: __( '丸（枠線なし）', THEME_NAME ),
                },
                {
                  value: 'cb',
                  label: __( '丸（枠線あり）', THEME_NAME ),
                },
              ] }
            />

          </PanelBody>
        </InspectorControls>

        <div
          className={ getBalloonClasses(id, style, position, iconstyle) }>
          <div className="speech-person">
            <figure className="speech-icon">
              <MediaUpload
                onSelect={ ( media ) => {
                  let newicon = !! media.sizes.thumbnail ? media.sizes.thumbnail.url : media.url;
                  //console.log(newicon);
                  setAttributes( { icon: newicon, iconid: media.id } );
                } }
                type="image"
                value={ iconid }
                render={ renderIcon }
              />
            </figure>
            <div className="speech-name">
              <RichText
                value={ name }
                placeholder={DEFAULT_NAME}
                onChange={ ( value ) => setAttributes( { name: value } ) }
              />
            </div>
          </div>
          <div className="speech-balloon">
            <InnerBlocks />
          </div>
        </div>

      </Fragment>
    );
  },

  save( { attributes } ) {
    const { name, index, id, icon, style, position, iconstyle } = attributes;
    return (
        <div
          className={ getBalloonClasses(id, style, position, iconstyle) }>
          <div className="speech-person">
            <figure className="speech-icon">
              <img
                src={ icon }
                alt={ name }
                className="speech-icon-image"
              />
            </figure>
            <div className="speech-name">
              <RichText.Content
                value={ name }
              />
            </div>
          </div>
          <div className="speech-balloon">
            <InnerBlocks.Content />
          </div>
        </div>
    );
  }
} );